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

class Uppercase extends AbstractRule
{
    public function validate($input)
    {
        return $input === mb_strtoupper($input, mb_detect_encoding($input));
    }
}
