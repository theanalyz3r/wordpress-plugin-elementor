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

class FalseVal extends AbstractRule
{
    public function validate($input)
    {
        if (false === $input) { // PHP 5.3 workaround
            return true;
        }

        return (false === filter_var($input, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE));
    }
}
