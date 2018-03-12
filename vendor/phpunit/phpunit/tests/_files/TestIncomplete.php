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

class TestIncomplete extends TestCase
{
    protected function runTest()
    {
        $this->markTestIncomplete('Incomplete test');
    }
}
