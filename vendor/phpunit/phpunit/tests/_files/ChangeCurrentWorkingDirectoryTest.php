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

class ChangeCurrentWorkingDirectoryTest extends TestCase
{
    public function testSomethingThatChangesTheCwd()
    {
        chdir('../');
        $this->assertTrue(true);
    }
}
