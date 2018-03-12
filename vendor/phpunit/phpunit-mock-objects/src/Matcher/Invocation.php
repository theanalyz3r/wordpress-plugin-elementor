<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

use PHPUnit\Framework\SelfDescribing;

/**
 * Interface for classes which matches an invocation based on its
 * method name, argument, order or call count.
 */
interface PHPUnit_Framework_MockObject_Matcher_Invocation extends SelfDescribing, PHPUnit_Framework_MockObject_Verifiable
{
    /**
     * Registers the invocation $invocation in the object as being invoked.
     * This will only occur after matches() returns true which means the
     * current invocation is the correct one.
     *
     * The matcher can store information from the invocation which can later
     * be checked in verify(), or it can check the values directly and throw
     * and exception if an expectation is not met.
     *
     * If the matcher is a stub it will also have a return value.
     *
     * @param PHPUnit_Framework_MockObject_Invocation $invocation Object containing information on a mocked or stubbed method which was invoked
     *
     * @return mixed
     */
    public function invoked(PHPUnit_Framework_MockObject_Invocation $invocation);

    /**
     * Checks if the invocation $invocation matches the current rules. If it does
     * the matcher will get the invoked() method called which should check if an
     * expectation is met.
     *
     * @param PHPUnit_Framework_MockObject_Invocation $invocation Object containing information on a mocked or stubbed method which was invoked
     *
     * @return bool
     */
    public function matches(PHPUnit_Framework_MockObject_Invocation $invocation);
}
