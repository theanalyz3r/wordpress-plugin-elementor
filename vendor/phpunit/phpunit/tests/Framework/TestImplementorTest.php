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

class TestImplementorTest extends TestCase
{
    public function testSuccessfulRun()
    {
        $result = new TestResult;

        $test = new \DoubleTestCase(new \Success);
        $test->run($result);

        $this->assertCount(\count($test), $result);
        $this->assertEquals(0, $result->errorCount());
        $this->assertEquals(0, $result->failureCount());
    }
}
