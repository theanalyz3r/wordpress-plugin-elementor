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

class TranslateContent implements \JsonSerializable {

  public $_content = "";

  public function __construct() {

  }

  public function addContent($value) {
    if(!empty($this->_content)) {
      throw new DocumentException("Content already exists. Please use method to edit it.", DocumentException::TRANSLATION_STRING_EXISTS);
    }

    $this->_content = $value;
    return true;
  }

  public function updateContent($value) {
    if(empty($value)) {
      throw new DocumentException("Content not exists. Please use method to edit it.", DocumentException::TRANSLATION_STRING_NOT_EXISTS);
    }

    $this->_content = $value;
    return true;
  }


  public function removeConyent($searchChunk) {
    $this->_content = "";
  }

  public function getContent() {
    if(!empty($this->_content)) {
      return $this->_content;
    }

    return false;
  }

  public function jsonSerialize() {
    return $this->_content;
  }
}