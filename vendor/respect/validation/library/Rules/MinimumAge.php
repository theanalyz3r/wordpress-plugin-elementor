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

use DateTime;
use Respect\Validation\Exceptions\ComponentException;

class MinimumAge extends AbstractRule
{
    public $age = null;
    public $format = null;

    public function __construct($age, $format = null)
    {
        if (!filter_var($age, FILTER_VALIDATE_INT)) {
            throw new ComponentException('The age must be a integer value.');
        }

        $this->age = $age;
        $this->format = $format;
    }

    public function validate($input)
    {
        if ($input instanceof DateTime) {
            $birthday = new \DateTime('now - '.$this->age.' year');

            return $birthday > $input;
        }

        if (!is_string($input) || (is_null($this->format) && false === strtotime($input))) {
            return false;
        }

        $age = ((date('Ymd') - date('Ymd', strtotime($input))) / 10000);

        return $age >= $this->age;
    }
}
