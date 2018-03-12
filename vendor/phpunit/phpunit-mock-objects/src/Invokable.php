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
 * Interface for classes which can be invoked.
 *
 * The invocation will be taken from a mock object and passed to an object
 * of this class.
 */
interface PHPUnit_Framework_MockObject_Invokable extends PHPUnit_Framework_MockObject_Verifiable
{
    /**
     * Invokes the invocation object $invocation so that it can be checked for
     * expectations or matched against stubs.
     *
     * @param PHPUnit_Framework_MockObject_Invocation $invocation The invocation object passed from mock object
     *
     * @return object
     */
    public function invoke(PHPUnit_Framework_MockObject_Invocation $invocation);

    /**
     * Checks if the invocation matches.
     *
     * @param PHPUnit_Framework_MockObject_Invocation $invocation The invocation object passed from mock object
     *
     * @return bool
     */
    public function matches(PHPUnit_Framework_MockObject_Invocation $invocation);
}
