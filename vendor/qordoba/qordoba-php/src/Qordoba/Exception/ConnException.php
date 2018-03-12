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

class ConnException extends BaseException {
  const URL_NOT_PROVIDED = 1;
  const BAD_RESPONSE = 2;
}