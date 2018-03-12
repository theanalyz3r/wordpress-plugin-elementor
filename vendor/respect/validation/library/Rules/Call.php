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

class Call extends AbstractRelated
{
    public function getReferenceValue($input)
    {
        return call_user_func_array($this->reference, [&$input]);
    }

    public function hasReference($input)
    {
        return is_callable($this->reference);
    }
}
