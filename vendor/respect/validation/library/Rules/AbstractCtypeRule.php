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

abstract class AbstractCtypeRule extends AbstractFilterRule
{
    abstract protected function ctypeFunction($input);

    protected function filterWhiteSpaceOption($input)
    {
        if (!empty($this->additionalChars)) {
            $input = str_replace(str_split($this->additionalChars), '', $input);
        }

        return preg_replace('/\s/', '', $input);
    }

    public function validateClean($input)
    {
        return $this->ctypeFunction($input);
    }
}
