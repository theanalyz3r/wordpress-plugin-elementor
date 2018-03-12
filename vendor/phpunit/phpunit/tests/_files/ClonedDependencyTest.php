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

class ClonedDependencyTest extends TestCase
{
    private static $dependency;

    public static function setUpBeforeClass()
    {
        self::$dependency = new stdClass;
    }

    public function testOne()
    {
        $this->assertTrue(true);

        return self::$dependency;
    }

    /**
     * @depends testOne
     */
    public function testTwo($dependency)
    {
        $this->assertSame(self::$dependency, $dependency);
    }

    /**
     * @depends !clone testOne
     */
    public function testThree($dependency)
    {
        $this->assertSame(self::$dependency, $dependency);
    }

    /**
     * @depends clone testOne
     */
    public function testFour($dependency)
    {
        $this->assertNotSame(self::$dependency, $dependency);
    }
}
