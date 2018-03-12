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
 * @runClassInSeparateProcess
 * @preserveGlobalState enabled
 */
class Issue2591_SeparateClassPreserveTest extends TestCase
{
    public function testOriginalGlobalString()
    {
        $this->assertEquals('Hello', $GLOBALS['globalString']);
    }

    public function testChangedGlobalString()
    {
        $GLOBALS['globalString'] = 'Hello!';
        $this->assertEquals('Hello!', $GLOBALS['globalString']);
    }

    public function testGlobalString()
    {
        $this->assertEquals('Hello!', $GLOBALS['globalString']);
    }

}
