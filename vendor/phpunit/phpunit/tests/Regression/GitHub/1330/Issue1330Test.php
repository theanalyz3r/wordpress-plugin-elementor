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

class Issue1330Test extends TestCase
{
    public function testTrue()
    {
        $this->assertTrue(PHPUNIT_1330);
    }
}
