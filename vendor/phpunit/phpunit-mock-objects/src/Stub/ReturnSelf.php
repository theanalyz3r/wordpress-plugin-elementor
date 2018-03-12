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
 * Stubs a method by returning the current object.
 */
class PHPUnit_Framework_MockObject_Stub_ReturnSelf implements PHPUnit_Framework_MockObject_Stub
{
    public function invoke(PHPUnit_Framework_MockObject_Invocation $invocation)
    {
        if (!$invocation instanceof PHPUnit_Framework_MockObject_Invocation_Object) {
            throw new PHPUnit_Framework_MockObject_RuntimeException(
                'The current object can only be returned when mocking an ' .
                'object, not a static class.'
            );
        }

        return $invocation->object;
    }

    public function toString()
    {
        return 'return the current object';
    }
}
