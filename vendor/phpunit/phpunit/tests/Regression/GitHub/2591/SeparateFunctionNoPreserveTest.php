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

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
class Issue2591_SeparateFunctionNoPreserveTest extends TestCase
{
    public function testChangedGlobalString()
    {
        $GLOBALS['globalString'] = 'Hello!';
        $this->assertEquals('Hello!', $GLOBALS['globalString']);
    }

    public function testGlobalString()
    {
        $this->assertEquals('Hello', $GLOBALS['globalString']);
    }

}
