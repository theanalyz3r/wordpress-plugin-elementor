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

class TranslateSection implements \JsonSerializable {

  public $_key;
  public $_strings = [];

  public function __construct($key) {
    $this->_key = $key;
  }

  public function addTranslationString($key, $value) {
    if(isset($this->_strings[$key])) {
      throw new DocumentException("String already exists. Please use method to edit it.", DocumentException::TRANSLATION_STRING_EXISTS);
    }

    $this->_strings[$key] = new TranslateString($key, $value, $this);
    return true;
  }

  public function updateTranslationString($key, $value) {
    if(!isset($this->_strings[$key])) {
      throw new DocumentException("String not exists. Please use method to edit it.", DocumentException::TRANSLATION_STRING_NOT_EXISTS);
    }

    $this->_strings[$key] = new TranslateString($key, $value, $this);;
    return true;
  }


  public function removeTranslationString($searchChunk) {
    if(isset($this->_strings[$searchChunk])) {
      return $this->removeTranslationStringByKey($searchChunk);
    } else {
      return $this->removeTranslationStringByValue($searchChunk);
    }
  }

  private function removeTranslationStringByKey($searchChunk) {
    if(isset($this->_strings[$searchChunk])) {
      unset($this->_strings[$searchChunk]);
      return true;
    }

    return false;
  }

  private function removeTranslationStringByValue($searchChunk) {
    $result = false;
    foreach($this->_strings as $key => $val) {
      if($searchChunk == $val) {
        unset($this->_strings[$key]);
        $result = true;
      }
    }

    return $result;
  }

  public function jsonSerialize() {
    return $this->_strings;
  }
}