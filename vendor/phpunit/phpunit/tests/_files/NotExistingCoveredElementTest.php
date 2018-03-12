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

class NotExistingCoveredElementTest extends TestCase
{
    /**
     * @covers NotExistingClass
     */
    public function testOne()
    {
    }

    /**
     * @covers NotExistingClass::notExistingMethod
     */
    public function testTwo()
    {
    }

    /**
     * @covers NotExistingClass::<public>
     */
    public function testThree()
    {
    }
}
