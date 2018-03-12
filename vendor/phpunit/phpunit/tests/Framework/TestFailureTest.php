<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace PHPUnit\Framework;

class TestFailureTest extends TestCase
{
    public function testToString()
    {
        $test      = new self(__FUNCTION__);
        $exception = new Exception('message');
        $failure   = new TestFailure($test, $exception);

        $this->assertEquals(__METHOD__ . ': message', $failure->toString());
    }

    public function testToStringForError()
    {
        $test      = new self(__FUNCTION__);
        $exception = new \Error('message');
        $failure   = new TestFailure($test, $exception);

        $this->assertEquals(__METHOD__ . ': message', $failure->toString());
    }

    public function testgetExceptionAsString()
    {
        $test      = new self(__FUNCTION__);
        $exception = new \Error('message');
        $failure   = new TestFailure($test, $exception);

        $this->assertEquals("Error: message\n", $failure->getExceptionAsString());
    }
}
