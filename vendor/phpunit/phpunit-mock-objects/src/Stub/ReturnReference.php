<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

/**
 * Stubs a method by returning a user-defined reference to a value.
 */
class PHPUnit_Framework_MockObject_Stub_ReturnReference extends PHPUnit_Framework_MockObject_Stub_Return
{
    public function __construct(&$value)
    {
        $this->value = &$value;
    }
}
