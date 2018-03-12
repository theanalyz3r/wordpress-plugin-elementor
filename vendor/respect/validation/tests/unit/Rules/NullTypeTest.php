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
 * @covers Respect\Validation\Rules\NullType
 * @covers Respect\Validation\Exceptions\NullTypeException
 */
class NullTypeTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new NullType();
    }

    public function testNullValue()
    {
        $this->assertTrue($this->object->assert(null));
        $this->assertTrue($this->object->__invoke(null));
        $this->assertTrue($this->object->check(null));
    }

    /**
     * @dataProvider providerForNotNull
     * @expectedException Respect\Validation\Exceptions\NullTypeException
     */
    public function testNotNull($input)
    {
        $this->assertFalse($this->object->__invoke($input));
        $this->assertFalse($this->object->assert($input));
    }

    public function providerForNotNull()
    {
        return [
            [''],
            [0],
            ['w poiur'],
            [' '],
            ['Foo'],
        ];
    }
}
