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
 * An object that stubs the process of a normal method for a mock object.
 *
 * The stub object will replace the code for the stubbed method and return a
 * specific value instead of the original value.
 */
interface PHPUnit_Framework_MockObject_Stub extends SelfDescribing {
	/**
	 * Fakes the processing of the invocation $invocation by returning a
	 * specific value.
	 *
	 * @param PHPUnit_Framework_MockObject_Invocation $invocation The invocation which was mocked and matched by the current method and argument matchers
	 *
	 * @return mixed
	 */
	public function invoke( PHPUnit_Framework_MockObject_Invocation $invocation );
}
