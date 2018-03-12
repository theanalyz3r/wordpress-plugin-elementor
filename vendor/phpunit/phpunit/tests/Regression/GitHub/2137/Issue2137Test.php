<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

class Issue2137Test extends PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider provideBrandService
     * @param $provided
     * @param $expected
     */
    public function testBrandService($provided, $expected)
    {
        $this->assertSame($provided, $expected);
    }


    public function provideBrandService()
    {
        return [
            //[true, true]
            new stdClass() // not valid
        ];
    }


    /**
     * @dataProvider provideBrandService
     * @param $provided
     * @param $expected
     */
    public function testSomethingElseInvalid($provided, $expected)
    {
        $this->assertSame($provided, $expected);
    }
}
