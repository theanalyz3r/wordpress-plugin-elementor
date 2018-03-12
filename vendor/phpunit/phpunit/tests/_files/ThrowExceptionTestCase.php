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

class ThrowExceptionTestCase extends TestCase
{
    public function test()
    {
        throw new RuntimeException('A runtime error occurred');
    }
}
