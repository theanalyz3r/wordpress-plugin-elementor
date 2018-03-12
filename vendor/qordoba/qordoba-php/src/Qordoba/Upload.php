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

use Qordoba\Exception\UploadException;
use Respect\Validation\Validator as v;

class Upload {

  private $fileName;
  private $projectId;
  private $uploadId;
  private $organizationId;

  public function __construct(Connection $connection, $projectId, $organizationId) {
    $this->connection     = $connection;
    $this->projectId      = $projectId;
    $this->organizationId = $organizationId;
  }

  public function setFileName($fileName) {
    if(!v::alnum("-.")->validate($fileName)) {
      throw new UploadException("Upload file name not valid.", UploadException::WRONG_FILENAME);
    }

    $this->fileName = $fileName;
  }

  public function getFileName() {
    return $this->fileName;
  }


  public function searchTranslationFile($fileName, $tag) {
    $this->connection->fetchFilenameSearch($fileName, $tag);
  }

  public function sendFile($fileName, $content, $update = false, $fileId = 0, $tag = null) {
    $this->setFileName($fileName);

    $tmpfile = tempnam(sys_get_temp_dir(), $fileName);
    file_put_contents($tmpfile, $content);

    if($update) {
      $uploaId = $this->connection->requestFileUploadUpdate($this->getFileName(), $tmpfile, $this->projectId, $fileId);
      $this->uploadId = $uploaId;
      return $this->uploadId;
    }

    $uploaId = $this->connection->requestFileUpload($this->getFileName(), $tmpfile, $this->projectId, $this->organizationId);
    $this->uploadId = $uploaId;
    return $this->uploadId;
  }

  public function appendToProject($tagName = "New") {
    $fileId = $this->connection->requestAppendToProject($this->fileName, $this->uploadId, $tagName, $this->projectId);

    return $fileId;
  }
}