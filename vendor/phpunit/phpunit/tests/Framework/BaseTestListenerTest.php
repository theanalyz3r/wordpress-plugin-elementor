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

class BaseTestListenerTest extends TestCase
{
    /**
     * @var TestResult
     */
    private $result;

    public function testEndEventsAreCounted()
    {
        $this->result = new TestResult;
        $listener     = new \BaseTestListenerSample;

        $this->result->addListener($listener);

        $test = new \Success;
        $test->run($this->result);

        $this->assertEquals(1, $listener->endCount);
    }
}
