<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

use PHPUnit\ExampleExtension\TestCaseTrait;
use PHPUnit\Framework\TestCase;

class OneTest extends TestCase
{
    use TestCaseTrait;

    public function testOne()
    {
        $this->assertExampleExtensionInitialized();
    }
}
