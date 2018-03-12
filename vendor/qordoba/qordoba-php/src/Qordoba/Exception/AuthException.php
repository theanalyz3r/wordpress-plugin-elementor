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

class AuthException extends BaseException {
  const USERNAME_NOT_PROVIDED = 1;
  const PASSWORD_NOT_PROVIDED = 2;
}