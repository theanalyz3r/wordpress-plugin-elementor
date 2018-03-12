<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Respect\Validation\Rules;

class NoWhitespace extends AbstractRule
{
    public function validate($input)
    {
        if (is_null($input)) {
            return true;
        }

        if (false === is_scalar($input)) {
            return false;
        }

        return !preg_match('#\s#', $input);
    }
}
