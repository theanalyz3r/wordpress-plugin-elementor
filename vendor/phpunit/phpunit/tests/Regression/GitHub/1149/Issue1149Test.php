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

class Issue1149Test extends TestCase
{
    public function testOne()
    {
        $this->assertTrue(true);
        print '1';
    }

    /**
     * @runInSeparateProcess
     */
    public function testTwo()
    {
        $this->assertTrue(true);
        print '2';
    }
}
