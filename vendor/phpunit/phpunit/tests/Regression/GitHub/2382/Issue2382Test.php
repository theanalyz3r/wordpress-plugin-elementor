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

class Issue2382Test extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testOne($test)
    {
        $this->assertInstanceOf(\Exception::class, $test);
    }

    public function dataProvider()
    {
        return [
            [
                $this->getMockBuilder(\Exception::class)->getMock()
            ]
        ];
    }
}
