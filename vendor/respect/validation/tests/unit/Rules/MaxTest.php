<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Respect\Validation\Rules;

/**
 * @group  rule
 * @covers Respect\Validation\Rules\Max
 * @covers Respect\Validation\Exceptions\MaxException
 */
class MaxTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerForValidMax
     */
    public function testValidMaxInputShouldReturnTrue($maxValue, $inclusive, $input)
    {
        $max = new Max($maxValue, $inclusive);
        $this->assertTrue($max->validate($input));
        $this->assertTrue($max->check($input));
        $this->assertTrue($max->assert($input));
    }

    /**
     * @dataProvider providerForInvalidMax
     * @expectedException Respect\Validation\Exceptions\MaxException
     */
    public function testInvalidMaxValueShouldThrowMaxException($maxValue, $inclusive, $input)
    {
        $max = new Max($maxValue, $inclusive);
        $this->assertFalse($max->validate($input));
        $this->assertFalse($max->assert($input));
    }

    public function providerForValidMax()
    {
        return [
            [200, false, ''],
            [200, false, 165.0],
            [200, false, -200],
            [200, true, 200],
            [200, false, 0],
            ['-18 years', true, '1988-09-09'],
            ['z', true, 'z'],
            ['z', false, 'y'],
            ['tomorrow', true, 'now'],
        ];
    }

    public function providerForInvalidMax()
    {
        return [
            [200, false, 300],
            [200, false, 250],
            [200, false, 1500],
            [200, false, 200],
        ];
    }
}
