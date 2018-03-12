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

class Issue322Test extends TestCase
{
    /**
     * @group one
     */
    public function testOne()
    {
        $this->assertTrue(true);
    }

    /**
     * @group two
     */
    public function testTwo()
    {
        $this->assertTrue(true);
    }
}
