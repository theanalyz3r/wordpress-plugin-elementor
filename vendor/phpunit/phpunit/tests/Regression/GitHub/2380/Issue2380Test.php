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

class Issue2380Test extends TestCase
{
    /**
     * @dataProvider generatorData
     */
    public function testGeneratorProvider($data)
    {
        $this->assertNotEmpty($data);
    }

    /**
     * @return Generator
     */
    public function generatorData()
    {
        yield ['testing'];
    }
}
