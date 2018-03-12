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

class Issue1437Test extends TestCase
{
    public function testFailure()
    {
        ob_start();
        $this->assertTrue(false);
    }
}
