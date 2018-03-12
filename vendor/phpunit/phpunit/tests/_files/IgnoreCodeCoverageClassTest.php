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

class IgnoreCodeCoverageClassTest extends TestCase
{
    public function testReturnTrue()
    {
        $sut = new IgnoreCodeCoverageClass();
        $this->assertTrue($sut->returnTrue());
    }

    public function testReturnFalse()
    {
        $sut = new IgnoreCodeCoverageClass();
        $this->assertFalse($sut->returnFalse());
    }
}
