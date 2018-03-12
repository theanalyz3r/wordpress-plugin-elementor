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

class Max extends AbstractInterval
{
    public function validate($input)
    {
        if ($this->inclusive) {
            return $this->filterInterval($input) <= $this->filterInterval($this->interval);
        }

        return $this->filterInterval($input) < $this->filterInterval($this->interval);
    }
}
