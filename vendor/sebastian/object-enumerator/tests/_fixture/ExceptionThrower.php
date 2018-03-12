<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace SebastianBergmann\ObjectEnumerator\Fixtures;

use RuntimeException;

class ExceptionThrower
{
    private $property;

    public function __construct()
    {
        unset($this->property);
    }

    public function __get($property)
    {
        throw new RuntimeException;
    }
}
