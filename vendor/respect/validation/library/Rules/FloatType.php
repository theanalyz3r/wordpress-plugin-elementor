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

class FloatType extends AbstractRule
{
    public function validate($input)
    {
        return is_float($input);
    }
}
