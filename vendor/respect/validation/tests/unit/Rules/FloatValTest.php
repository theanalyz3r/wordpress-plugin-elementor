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
 * @covers Respect\Validation\Rules\FloatVal
 * @covers Respect\Validation\Exceptions\FloatValException
 */
class FloatValTest extends \PHPUnit_Framework_TestCase
{
    protected $floatValidator;

    protected function setUp()
    {
        $this->floatValidator = new FloatVal();
    }

    /**
     * @dataProvider providerForFloat
     */
    public function testFloatNumbersShouldPass($input)
    {
        $this->assertTrue($this->floatValidator->assert($input));
        $this->assertTrue($this->floatValidator->__invoke($input));
        $this->assertTrue($this->floatValidator->check($input));
    }

    /**
     * @dataProvider providerForNotFloat
     * @expectedException Respect\Validation\Exceptions\FloatValException
     */
    public function testNotFloatNumbersShouldFail($input)
    {
        $this->assertFalse($this->floatValidator->__invoke($input));
        $this->assertFalse($this->floatValidator->assert($input));
    }

    public function providerForFloat()
    {
        return [
            [165],
            [1],
            [0],
            [0.0],
            ['1'],
            ['19347e12'],
            [165.0],
            ['165.7'],
            [1e12],
        ];
    }

    public function providerForNotFloat()
    {
        return [
            [''],
            [null],
            ['a'],
            [' '],
            ['Foo'],
        ];
    }
}
