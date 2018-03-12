<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

use PHPUnit\Framework\TestCase;

class Issue2158Test extends TestCase
{
    /**
     * Set constant in main process
     */
    public function testSomething()
    {
        include __DIR__ . '/constant.inc';
        $this->assertTrue(true);
    }

    /**
     * Constant defined previously in main process constant should be available and
     * no errors should be yielded by reload of included files
     *
     * @runInSeparateProcess
     */
    public function testSomethingElse()
    {
        $this->assertTrue(defined('TEST_CONSTANT'));
    }
}
