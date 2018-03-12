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

use Qordoba\Project;
use Qordoba\Connection;

use Qordoba\TranslateContent;
use Qordoba\TranslateSection;
use Qordoba\TranslateString;


class Document {

  private $connection         = null;
  private $project            = null;
  private $translationStrings = [];
  private $translationContent = "";
  private $translationResult  = [];
  private $type               = "json";
  private $tag                = "New";
  private $name               = "";
  private $id                 = null;
  private $languages          = null;
  private $types              = ['json', 'html'];

  public $_sections          = [];


  public function __construct($apiUrl, $username, $password, $projectId, $organizationId) {
    $this->connection   = new Connection($apiUrl, $username, $password);
    $this->project      = new Project($projectId, $organizationId, $this->connection);
  }

  public function getProject() {
    return $this->project;
  }

  public function getConnection() {
    return $this->connection;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  public function setType($type) {
    $this->type = $type;
  }

  public function getType() {
    return $this->type;
  }

  public function setTag($tag) {
    $this->tag = $tag;
  }

  public function getTag() {
    return $this->tag;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }


  public function addSection($key) {
    if($this->getType() != "json") {
      throw new DocumentException("Strings can be added only to appropriate project. Please set type to 'json'.", DocumentException::TRANSLATION_WRONG_TYPE);
    }

    $this->_sections[$key] = new TranslateSection($key);
    return $this->_sections[$key];
  }

  public function getTranslationContent() {
    if($this->getType() != "html") {
      throw new DocumentException("HTML content can be added only to appropriate project. Please set type to 'html'.", DocumentException::TRANSLATION_WRONG_TYPE);
    }

    return $this->translationContent->getContent();
  }

  public function getTranslationString($key) {
    if($this->getType() != "json") {
      throw new DocumentException("Strings can be added only to appropriate project. Please set type to 'json'.", DocumentException::TRANSLATION_WRONG_TYPE);
    }

    if(!isset($this->translationStrings[$key])) {
      return false;
    }

    return $this->translationStrings[$key];
  }

  public function getTranslationStrings() {
    if($this->getType() != "json") {
      throw new DocumentException("Strings can be added only to appropriate project. Please set type to 'json'.", DocumentException::TRANSLATION_WRONG_TYPE);
    }

    return $this->translationStrings;
  }

  public function fetchMetadata() {
    if($this->languages == null) {
      $this->languages = $this->connection->fetchLanguages();
    }
  }

  public function getMetadata() {
    $this->fetchMetadata();

    return [
      'languages' => $this->languages
    ];
  }

  public function getProjectLanguages() {
    return $this->project->getMetadata()->project->target_languages;
  }

  public function createTranslation() {
    $contents = null;

    switch($this->getType()) {
      case "json": {
        $contents = json_encode($this->_sections);
        break;
      }
      case "html": {
        $contents = $this->getTranslationContent();
        break;
      }
    }

    if(empty($contents)) {
      throw new DocumentException("Contents for upload is empty");
    }

    $this->id = $this->project->upload($this->getName(), $contents, $this->getTag(), $this->getType());
    return $this->getId();
  }

  public function updateTranslation() {
    if(!$this->getId()) {
      //Search for file
      $locales = $this->getProject()->check($this->getName(), null, null, "none");
      $locale = null;
      foreach($locales as $key => $val) {
        if(count($val->pages) > 0) {
          foreach($val->pages as $inkey => $page) {
            //if($page->version_tag == $this->getTag()) {
              $locale = $val->pages[$inkey];
              break;
            //}
          }
          break;
        }
      }

      if($locale == null) {
        throw new DocumentException("You must create file before updating.");
      }

      $this->setId($locale->page_id);
    }
    $contents = null;

    switch($this->getType()) {
      case "json": {
        $contents = json_encode($this->_sections);
        break;
      }
      case "html": {
        $contents = $this->getTranslationContent();
        break;
      }
    }

    if(empty($contents)) {
      throw new DocumentException("Contents for upload is empty");
    }

    if($this->project->update($this->getName(), $contents, $this->getTag(), $this->getId(), $this->getType())) {
      return $this->getId();
    };
  }

  public function checkTranslation($languageCode = null) {
    return $this->project->check($this->getName(), $languageCode, $this->getTag(), $this->getType());
  }

  public function fetchTranslation($languageCode = null) {
    return $this->project->fetch($this->getName(), $languageCode, $this->getTag(), $this->getType());
  }

  public function getProjectLanguageCodes() {
    $langs = [];
    foreach($this->project->getMetadata()->project->target_languages as $key => $lang) {
      array_push($langs, ['id' => $lang->id, 'code' => $lang->code]);
    }

    return $langs;
  }

  public function addTranslationContent($value) {
//    if($this->getType() != "html") {
//      throw new DocumentException("HTML content can be added only to appropriate project. Please set type to 'html'.", DocumentException::TRANSLATION_WRONG_TYPE);
//    }

    $this->translationContent = new TranslateContent();
    $this->translationContent->addContent($value);

    return true;
  }

  public function addTranslationString($key, $value) {
    if($this->getType() != "json") {
      throw new DocumentException("Strings can be added only to appropriate project. Please set type to 'json'.", DocumentException::TRANSLATION_WRONG_TYPE);
    }

    if(isset($this->_sections[$key])) {
      throw new DocumentException("String already exists. Please use method to edit it.", DocumentException::TRANSLATION_STRING_EXISTS);
    }

    $this->_sections[$key] = new TranslateString($key, $value, $this);
    return true;
  }

  public function updateTranslationContent($value) {
    if($this->getType() != "html") {
      throw new DocumentException("HTML content can be added only to appropriate project. Please set type to 'html'.", DocumentException::TRANSLATION_WRONG_TYPE);
    }

    if(!$this->translationContent) {
      throw new DocumentException("Cannot update unexist content.", DocumentException::TRANSLATION_WRONG_TYPE);
    }
    $this->translationContent->updateContent($value);
    return true;
  }


  public function updateTranslationString($key, $value) {
    if($this->getType() != "json") {
      throw new DocumentException("Strings can be added only to appropriate project. Please set type to 'json'.", DocumentException::TRANSLATION_WRONG_TYPE);
    }

    if(!isset($this->_sections[$key]) || $this->_sections[$key] instanceof TranslateSection) {
      throw new DocumentException("String not exists. Please use method to edit it.", DocumentException::TRANSLATION_STRING_NOT_EXISTS);
    }

    $this->_sections[$key] = new TranslateString($key, $value, $this);;
    return true;
  }


  public function removeTranslationContent($value) {
    if($this->getType() != "html") {
      throw new DocumentException("HTML content can be added only to appropriate project. Please set type to 'html'.", DocumentException::TRANSLATION_WRONG_TYPE);
    }

    if(!$this->translationContent) {
      throw new DocumentException("Cannot update unexist content.", DocumentException::TRANSLATION_WRONG_TYPE);
    }
    $this->translationContent = null;
    return true;
  }

  public function removeTranslationString($searchChunk) {
    if($this->getType() != "json") {
      throw new DocumentException("Strings can be added only to appropriate project. Please set type to 'json'.", DocumentException::TRANSLATION_WRONG_TYPE);
    }

    if(isset($this->_sections[$searchChunk])) {
      return $this->removeTranslationStringByKey($searchChunk);
    } else {
      return $this->removeTranslationStringByValue($searchChunk);
    }
  }

  private function removeTranslationStringByKey($searchChunk) {
    if($this->getType() != "json") {
      throw new DocumentException("Strings can be added only to appropriate project. Please set type to 'json'.", DocumentException::TRANSLATION_WRONG_TYPE);
    }

    if(isset($this->_sections[$searchChunk]) && $this->_sections[$searchChunk] instanceof TranslateString) {
      unset($this->_sections[$searchChunk]);
      return true;
    }

    return false;
  }

  private function removeTranslationStringByValue($searchChunk) {
    if($this->getType() != "json") {
      throw new DocumentException("Strings can be added only to appropriate project. Please set type to 'json'.", DocumentException::TRANSLATION_WRONG_TYPE);
    }

    $result = false;
    foreach($this->_sections as $key => $val) {
      if($searchChunk == $val && $this->_sections[$key] instanceof TranslateString) {
        unset($this->_sections[$key]);
        $result = true;
      }
    }

    return $result;
  }
}