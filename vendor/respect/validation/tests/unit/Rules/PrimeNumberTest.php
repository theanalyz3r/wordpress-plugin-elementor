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
 * @covers Respect\Validation\Rules\PrimeNumber
 * @covers Respect\Validation\Exceptions\PrimeNumberException
 */
class PrimeNumberTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new PrimeNumber();
    }

    /**
     * @dataProvider providerForPrimeNumber
     */
    public function testPrimeNumber($input)
    {
        $this->assertTrue($this->object->__invoke($input));
        $this->assertTrue($this->object->check($input));
        $this->assertTrue($this->object->assert($input));
    }

    /**
     * @dataProvider providerForNotPrimeNumber
     * @expectedException Respect\Validation\Exceptions\PrimeNumberException
     */
    public function testNotPrimeNumber($input)
    {
        $this->assertFalse($this->object->__invoke($input));
        $this->assertFalse($this->object->assert($input));
    }

    public function providerForPrimeNumber()
    {
        return [
            [3],
            [5],
            [7],
            ['3'],
            ['5'],
            ['+7'],
        ];
    }

    public function providerForNotPrimeNumber()
    {
        return [
            [''],
            [null],
            [0],
            [10],
            [25],
            [36],
            [-1],
            ['-1'],
            ['25'],
            ['0'],
            ['a'],
            [' '],
            ['Foo'],
        ];
    }
}
