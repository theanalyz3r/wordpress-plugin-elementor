<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Qordoba;

use Qordoba\Exception\AuthException;
use Qordoba\Exception\ConnException;

use GuzzleHttp\Client as GuzzleClient;

use Qordoba\Exception\ServerException;

class Connection {

  private $username;
  private $password;
  private $apiUrl;
  private $apiKey;
  private $metadata;

  private $_requestCount = 0;
  private $_requests;

  public function __construct($apiUrl = null, $username = null, $password = null) {
    $this->setApiUrl($apiUrl);
    $this->setUsername($username);
    $this->setPassword($password);
  }

  public function setApiKey($apiKey) {
    $this->apiKey = $apiKey;
  }

  private function getApiKey() {
    return $this->apiKey;
  }

  public function setUsername($username) {
    $this->username = $username;
  }

  public function getUsername() {
    return $this->username;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setApiUrl($apiUrl) {
    $this->apiUrl = $apiUrl;
  }

  public function getApiUrl() {
    return rtrim($this->apiUrl, '/');
  }

  public function getConnectiontData() {
    return $this->metadata;
  }

  public function setConnectionData($data) {
    $this->metadata = $data;
  }

  public function getRequestCount() {
    return $this->_requestCount;
  }

  public function getRequests() {
    return $this->_requests;
  }

  public function requestAuthToken() {
    if(!empty($this->getApiKey())) {
      return $this->getApiKey();
    }

    // check params
    if(empty($this->getUsername())) {
      throw new AuthException("Username not provided", AuthException::USERNAME_NOT_PROVIDED);
    }

    if(empty($this->getPassword())) {
      throw new AuthException("Password ot provided", AuthException::USERNAME_NOT_PROVIDED);
    }

    if(empty($this->getApiUrl())) {
      throw new ConnException("API URL not provided", ConnException::URL_NOT_PROVIDED);
    }

    $headers = [
      'Content-Type' => 'application/json'
    ];

    $requestObj = new \stdClass();
    $requestObj->username = $this->getUsername();
    $requestObj->password = $this->getPassword();

    $options = [
      'headers' => $headers,
      'body' => json_encode($requestObj)
    ];

    $response = $this->processRequest("PUT", $this->getApiUrl() . "/login", $options);

    if($response->getStatusCode() != 200) {
      throw new ConnException('Non-200 response from API.', ConnException::BAD_RESPONSE);
    }

    $responseRawBody = $response->getBody()->getContents();
    if(!isJson($responseRawBody)) {
      throw new ConnException('Non-JSON response from API.', ConnException::BAD_RESPONSE);
    }

    $responseBody = json_decode($responseRawBody);
    if(!isset($responseBody->token)) {
      throw new ConnException('API token not found in response.', ConnException::BAD_RESPONSE);
    }

    $this->setConnectionData($responseBody);
    $this->setApiKey($responseBody->token);

    return $this->getApiKey();
  }

  public function requestFileUploadUpdate($fileName, $filePath, $projectId, $fileId) {
    $authToken = $this->requestAuthToken();

    $apiUrl = $this->getApiUrl()
      . '/projects/' . $projectId
      . '/files/' . $fileId
      . '/update/upload'
      . '?content_type_code=JSON';

    $options = [
      'multipart' => [
        [
          'name' => 'user_key',
          'contents' => $authToken
        ],
        [
          'name' => 'file_names',
          'contents' => '[]'
        ],
        [
          'name' => 'file',
          'contents' => file_get_contents($filePath),
          'filename' => $fileName,
          'headers'  => [
            'Content-Type' => 'application/octet-stream'
          ]
        ]
      ],
      'headers' => [
        'X-AUTH-TOKEN' => $authToken
      ]
    ];


    $response   = $this->processRequest('POST', $apiUrl, $options);
    $result     = json_decode($response->getBody()->getContents());

    if(!$result->id) {
      throw new ConnException("File upload failed");
    }

    return $result->id;
  }

  public function requestFileUpload($fileName, $filePath, $projectId, $organizationId) {
    $authToken = $this->requestAuthToken();

    $apiUrl = $this->getApiUrl()
      . '/organizations/' . $organizationId
      . '/upload/uploadFile_anyType?project_id=' . $projectId
      . '&content_type_code=JSON';

    $options = [
      'multipart' => [
        [
          'name' => 'user_key',
          'contents' => $authToken
        ],
        [
          'name' => 'file_names',
          'contents' => '[]'
        ],
        [
          'name' => 'file',
          'contents' => file_get_contents($filePath),
          'filename' => $fileName,
          'headers'  => [
            'Content-Type' => 'application/octet-stream'
          ]
        ]
      ],
      'headers' => [
        'X-AUTH-TOKEN' => $authToken
      ]
    ];

    $response   = $this->processRequest('POST', $apiUrl, $options);
    $result     = json_decode($response->getBody()->getContents());

    if($result->result != "success") {
      throw new ConnException("File upload failed");
    }

    return $result->upload_id;
  }

  public function requestAppendToProject($fileName, $uploadId, $tagName, $projectId) {
    $authToken = $this->requestAuthToken();

    $apiUrl = $this->getApiUrl()
      . '/projects/' . $projectId
      . '/append_files';

    $options = [
      'headers' => [
        'X-AUTH-TOKEN' => $authToken
      ],
      'json' => [
        [
          'source_columns' => [],
          'file_name' => $fileName,
          'version_tag' => $tagName,
          'id' => $uploadId
        ]
      ]
    ];

    $response   = $this->processRequest('POST', $apiUrl, $options);
    $result     = json_decode($response->getBody()->getContents());

    return array_shift($result->files_ids);
  }

  public function fetchLanguages() {
    $authToken = $this->requestAuthToken();

    $apiUrl = $this->getApiUrl()
      . '/languages';

    $options = [
      'headers' => [
        'X-AUTH-TOKEN' => $authToken
      ]
    ];

    $response   = $this->processRequest('GET', $apiUrl, $options);
    $result     = json_decode($response->getBody()->getContents());

    return $result;
  }

  public function fetchProject($projectId) {
    $authToken = $this->requestAuthToken();

    $apiUrl = $this->getApiUrl()
      . '/projects/' . $projectId;

    $options = [
      'headers' => [
        'X-AUTH-TOKEN' => $authToken
      ]
    ];

    $response   = $this->processRequest('GET', $apiUrl, $options);
    $result     = json_decode($response->getBody()->getContents());

    return $result;
  }

  public function fetchProjectSearch($projectId, $langId, $searchName = null, $searchStatus = "completed", $offset = 0, $limit = 50) {
    $authToken = $this->requestAuthToken();

    $apiUrl = $this->getApiUrl()
      . '/projects/' . $projectId
      . '/languages/' . $langId
      . '/page_settings/search?'
      . 'limit=' . $limit
      . '&offset=' . $offset;

    $searchStruct = new \StdClass();
    if($searchStatus != 'none') {
      $searchStruct->status = [ $searchStatus ];
    }
    if($searchName != null) {
      $searchStruct->title = $searchName;
    }

    $options = [
      'headers' => [
        'X-AUTH-TOKEN' => $authToken
      ],
      'json' => $searchStruct
    ];

    $response   = $this->processRequest('POST', $apiUrl, $options);
    $result     = json_decode($response->getBody()->getContents());

    return $result;
  }

  public function fetchTranslationFile($projectId, $langId, $pageId) {
    $authToken = $this->requestAuthToken();

    $apiUrl = $this->getApiUrl()
      . '/projects/' . $projectId
      . '/languages/' . $langId
      . '/pages/' . $pageId
      . '/segments/milestones/-100/export';

    $options = [
      'headers' => [
        'X-AUTH-TOKEN' => $authToken
      ]
    ];

    $response   = $this->processRequest('GET', $apiUrl, $options);
    $result     = json_decode($response->getBody()->getContents());


    $apiUrl = $this->getApiUrl()
      . '/file/download';

    $options = [
      'headers' => [
        'X-AUTH-TOKEN' => $authToken
      ],
      'query' => [
        'filename' => $result->filename,
        'token' => $result->token
      ]
    ];

    $response   = $this->processRequest('GET', $apiUrl, $options);
    $result     = $response->getBody()->getContents();

    $json       = json_decode($result);
    if(json_last_error() != JSON_ERROR_NONE) {
      return $result;
    }
    return $json;
  }

  private function processRequest($method, $apiUrl, $options) {
    try {
      $httpClient = new GuzzleClient();
      $response   = $httpClient->request($method, $apiUrl, $options);
    } catch (\Exception $e) {
      $message = $e->getMessage();
      if(preg_match('#\"errMessage\":\"([^\"]{1,})\"#', $message, $match)) {
        throw new ServerException($match[1]);
      }
      throw $e;
    }

    $this->_requestCount++;
    $this->_requests[] = $response;

    return $response;
  }
}
