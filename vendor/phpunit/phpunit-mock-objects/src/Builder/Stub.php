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
 * Builder interface for stubs which are actions replacing an invocation.
 */
interface PHPUnit_Framework_MockObject_Builder_Stub extends PHPUnit_Framework_MockObject_Builder_Identity
{
    /**
     * Stubs the matching method with the stub object $stub. Any invocations of
     * the matched method will now be handled by the stub instead.
     *
     * @param PHPUnit_Framework_MockObject_Stub $stub
     *
     * @return PHPUnit_Framework_MockObject_Builder_Identity
     */
    public function will(PHPUnit_Framework_MockObject_Stub $stub);
}
