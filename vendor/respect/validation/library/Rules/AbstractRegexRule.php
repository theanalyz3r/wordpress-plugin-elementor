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

abstract class AbstractRegexRule extends AbstractFilterRule
{
    abstract protected function getPregFormat();

    public function validateClean($input)
    {
        return preg_match($this->getPregFormat(), $input);
    }
}
