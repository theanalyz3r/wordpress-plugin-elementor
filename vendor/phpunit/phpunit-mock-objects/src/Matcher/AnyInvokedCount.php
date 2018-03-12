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
 * Invocation matcher which checks if a method has been invoked zero or more
 * times. This matcher will always match.
 */
class PHPUnit_Framework_MockObject_Matcher_AnyInvokedCount extends PHPUnit_Framework_MockObject_Matcher_InvokedRecorder
{
    /**
     * @return string
     */
    public function toString()
    {
        return 'invoked zero or more times';
    }

    public function verify()
    {
    }
}
