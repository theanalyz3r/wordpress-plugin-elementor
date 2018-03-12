<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Qordoba\Exception;

class DocumentException extends BaseException {
  const TRANSLATION_STRING_EXISTS = 1;
  const TRANSLATION_STRING_NOT_EXISTS = 2;
  const TRANSLATION_WRONG_TYPE = 3;
}