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

class Json extends AbstractRule
{
    public function validate($input)
    {
        if (!is_string($input) || '' === $input) {
            return false;
        }

        json_decode($input);

        return (json_last_error() === JSON_ERROR_NONE);
    }
}
