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

class WasRun extends TestCase
{
    public $wasRun = false;

    protected function runTest()
    {
        $this->wasRun = true;
    }
}
