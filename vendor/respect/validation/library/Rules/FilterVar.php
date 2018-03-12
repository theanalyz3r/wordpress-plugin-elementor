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

use Respect\Validation\Exceptions\ComponentException;

class FilterVar extends Callback
{
    public function __construct()
    {
        $arguments = func_get_args();
        if (!isset($arguments[0])) {
            throw new ComponentException('Cannot validate without filter flag');
        }

        if (!$this->isValidFilter($arguments[0])) {
            throw new ComponentException('Cannot accept the given filter');
        }

        $this->callback = 'filter_var';
        $this->arguments = $arguments;
    }

    private function isValidFilter($filter)
    {
        return in_array(
            $filter,
            [
                FILTER_VALIDATE_BOOLEAN,
                FILTER_VALIDATE_EMAIL,
                FILTER_VALIDATE_FLOAT,
                FILTER_VALIDATE_INT,
                FILTER_VALIDATE_IP,
                FILTER_VALIDATE_REGEXP,
                FILTER_VALIDATE_URL,
            ]
        );
    }
}
