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

class Multiple extends AbstractRule
{
    public $multipleOf;

    public function __construct($multipleOf)
    {
        $this->multipleOf = $multipleOf;
    }

    public function validate($input)
    {
        if ($this->multipleOf == 0) {
            return ($input == 0);
        }

        return ($input % $this->multipleOf == 0);
    }
}
