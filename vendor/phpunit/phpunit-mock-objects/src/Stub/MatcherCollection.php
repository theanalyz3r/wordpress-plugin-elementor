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
 * Stubs a method by returning a user-defined value.
 */
interface PHPUnit_Framework_MockObject_Stub_MatcherCollection
{
    /**
     * Adds a new matcher to the collection which can be used as an expectation
     * or a stub.
     *
     * @param PHPUnit_Framework_MockObject_Matcher_Invocation $matcher Matcher for invocations to mock objects
     */
    public function addMatcher(PHPUnit_Framework_MockObject_Matcher_Invocation $matcher);
}
