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

use stdClass;

/**
 * @group  rule
 * @covers Respect\Validation\Rules\Type
 * @covers Respect\Validation\Exceptions\TypeException
 */
class TypeTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldDefineTypeOnConstructor()
    {
        $type = 'int';
        $rule = new Type($type);

        $this->assertSame($type, $rule->type);
    }

    public function testShouldNotBeCaseSensitive()
    {
        $rule = new Type('InTeGeR');

        $this->assertTrue($rule->validate(42));
    }

    /**
     * @expectedException Respect\Validation\Exceptions\ComponentException
     * @expectedExceptionMessage "whatever" is not a valid type
     */
    public function testShouldThrowExceptionWhenTypeIsNotValid()
    {
        new Type('whatever');
    }

    /**
     * @dataProvider providerForValidType
     */
    public function testShouldValidateValidTypes($type, $input)
    {
        $rule = new Type($type);

        $this->assertTrue($rule->validate($input));
    }

    /**
     * @dataProvider providerForInvalidType
     */
    public function testShouldNotValidateInvalidTypes($type, $input)
    {
        $rule = new Type($type);

        $this->assertFalse($rule->validate($input));
    }

    /**
     * @expectedException Respect\Validation\Exceptions\TypeException
     * @expectedExceptionMessage "Something" must be "integer"
     */
    public function testShouldThrowTypeExceptionWhenCheckingAnInvalidInput()
    {
        $rule = new Type('integer');
        $rule->check('Something');
    }

    public function providerForValidType()
    {
        return [
            ['array', []],
            ['bool', true],
            ['boolean', false],
            ['callable', function () {}],
            ['double', 0.8],
            ['float', 1.0],
            ['int', 42],
            ['integer', 13],
            ['null', null],
            ['object', new stdClass()],
            ['resource', tmpfile()],
            ['string', 'Something'],
        ];
    }

    public function providerForInvalidType()
    {
        return [
            ['int', '1'],
            ['bool', '1'],
        ];
    }
}
