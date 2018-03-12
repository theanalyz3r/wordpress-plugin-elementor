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

use Qordoba\Exception\DocumentException;
use Qordoba\Exception\ProjectException;


class Project {

  private $projectId;
  private $organizationId;
  private $connection;
  private $metadata;

  private $upload = null;

  public function __construct($projectId, $organizationId, Connection $connection) {
    $this->setProjectId($projectId);
    $this->setOrganizationId($organizationId);
    $this->connection = $connection;
    $this->upload = new Upload($this->connection, $this->getProjectId(), $this->getOrganizationId());
  }

  public function getUpload() {
    return $this->upload;
  }

  public function setProjectId($projectId) {
    $this->projectId = $projectId;
  }

  public function getProjectId() {
    return $this->projectId;
  }

  public function setOrganizationId($organizationId) {
    $this->organizationId = $organizationId;
  }

  public function getOrganizationId() {
    return $this->organizationId;
  }

  public function fetchMetadata() {
    $this->metadata = $this->connection->fetchProject($this->getProjectId());

    $newLanguages = [];
    $languages = $this->metadata->project->target_languages;
    foreach($languages as $key => $lang) {
     $newLanguages[$lang->id] = $lang;
    }

    $this->metadata->project->target_languages = $newLanguages;

    return $this->getMetadata();
  }

  public function getMetadata() {
    if(!$this->metadata) {
      $this->fetchMetadata();
    }

    return $this->metadata;
  }

  private function checkProjectType($projectType) {
    $meta = $this->getMetadata();

    $type_found = false;
    foreach($meta->project->content_type_codes as $key => $type) {
      if($type->extensions[0] == $projectType) {
        $type_found = true;
      }
    }

    if(!$type_found) {
      throw new DocumentException("Sorry, this type of documents not supported by the project.");
    }
  }

  public function upload($documentName, $jsonToTranslate, $tag = null, $type = 'json') {
    $this->fetchMetadata();

    $this->checkProjectType($type);

    $this->upload->sendFile($documentName . "." . $type, $jsonToTranslate);
    return $this->upload->appendToProject($tag);
  }


  public function update($documentName, $jsonToTranslate, $tag = null, $fileId = null, $type = 'json') {
    $this->fetchMetadata();

    $this->checkProjectType($type);

    $this->upload->sendFile($documentName . "." . $type, $jsonToTranslate, true, $fileId, $tag);
    return $this->upload->appendToProject($tag);
  }

  public function check($documentName, $languageCode = null, $tag = null, $status = "completed", $type = "json") {
    if(!$documentName || mb_strlen($documentName) == 0) {
      throw new ProjectException("Document name is not defined.");
    }

    $this->fetchMetadata();

    $result = [];
    $langsByCode = [];

    foreach($this->getMetadata()->project->target_languages as $key => $lang) {
      $langsByCode[$lang->code] = ['id' => $lang->id, 'code' => $lang->code];
      $result[$lang->code] = $this->connection->fetchProjectSearch($this->getProjectId(), $lang->id, $documentName . "." . $type, $status);
    }

    if(($languageCode != null && $langsByCode[$languageCode] != null) && isset($result[$languageCode])) {
      return [$languageCode => $result[$languageCode]];
    } else if ($languageCode != null && !isset($result[$languageCode])) {
      throw new ProjectException('Checked language ID not found in project');
    }

    return $result;
  }

  public function fetch($documentName, $languageCode = null, $tag = null, $type = 'json') {
    if(!$documentName || mb_strlen($documentName) == 0) {
      throw new ProjectException("Document name is not defined.");
    }

    $this->fetchMetadata();
    $pages = $this->check($documentName, $languageCode, null, "completed", $type);
    $results = [];

    foreach($pages as $lang => $page) {
      if($page->meta->paging->total_results == 0) {
        continue;
      }

      if($tag !== null) {
        foreach($page->pages as $key => $doc) {
          if($doc->version_tag == $tag) {
            $results[$lang] = $doc;
            break;
          }
        }
      } else {
        $results[$lang] = array_shift($page->pages);
      }
    }

    $langsByCode = [];
    foreach($this->getMetadata()->project->target_languages as $key => $lang) {
      $langsByCode[$lang->code] = ['id' => $lang->id, 'code' => $lang->code];
      $result[$lang->code] = $this->connection->fetchProjectSearch($this->getProjectId(), $lang->id, $documentName . "." . $type, "completed");
    }

    foreach($results as $lang => $version) {
      if(isset($langsByCode[$lang])) {
        $results[$langsByCode[$lang]['code']] = $this->connection->fetchTranslationFile($this->getProjectId(), $langsByCode[$lang]['id'], $version->page_id);
      }
    }
    return $results;
  }
}