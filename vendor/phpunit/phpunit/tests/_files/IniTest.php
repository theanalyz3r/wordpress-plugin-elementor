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

class IniTest extends TestCase
{
    public function testIni()
    {
        $this->assertEquals('application/x-test', ini_get('default_mimetype'));
    }
}
