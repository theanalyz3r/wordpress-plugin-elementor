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
 * @covers Respect\Validation\Rules\Optional
 */
class OptionalTest extends \PHPUnit_Framework_TestCase
{
    public function providerForOptional()
    {
        return [
            [null],
            [''],
        ];
    }

    public function providerForNotOptional()
    {
        return [
            [1],
            [[]],
            [' '],
            [0],
            ['0'],
            [0],
            ['0.0'],
            [false],
            [['']],
            [[' ']],
            [[0]],
            [['0']],
            [[false]],
            [[[''], [0]]],
            [new stdClass()],
        ];
    }

    public function testShouldAcceptInstanceOfValidatobleOnConstructor()
    {
        $validatable = $this->getMock('Respect\\Validation\\Validatable');
        $rule = new Optional($validatable);

        $this->assertSame($validatable, $rule->getValidatable());
    }

    /**
     * @dataProvider providerForOptional
     */
    public function testShouldNotValidateRuleWhenInputIsOptional($input)
    {
        $validatable = $this->getMock('Respect\\Validation\\Validatable');
        $validatable
            ->expects($this->never())
            ->method('validate');

        $rule = new Optional($validatable);

        $this->assertTrue($rule->validate($input));
    }

    /**
     * @dataProvider providerForNotOptional
     */
    public function testShouldValidateRuleWhenInputIsNotOptional($input)
    {
        $validatable = $this->getMock('Respect\\Validation\\Validatable');
        $validatable
            ->expects($this->once())
            ->method('validate')
            ->with($input)
            ->will($this->returnValue(true));

        $rule = new Optional($validatable);

        $this->assertTrue($rule->validate($input));
    }

    public function testShouldNotAssertRuleWhenInputIsOptional()
    {
        $validatable = $this->getMock('Respect\\Validation\\Validatable');
        $validatable
            ->expects($this->never())
            ->method('assert');

        $rule = new Optional($validatable);

        $this->assertTrue($rule->assert(''));
    }

    public function testShouldAssertRuleWhenInputIsNotOptional()
    {
        $input = 'foo';

        $validatable = $this->getMock('Respect\\Validation\\Validatable');
        $validatable
            ->expects($this->once())
            ->method('assert')
            ->with($input)
            ->will($this->returnValue(true));

        $rule = new Optional($validatable);

        $this->assertTrue($rule->assert($input));
    }

    public function testShouldNotCheckRuleWhenInputIsOptional()
    {
        $validatable = $this->getMock('Respect\\Validation\\Validatable');
        $validatable
            ->expects($this->never())
            ->method('check');

        $rule = new Optional($validatable);

        $this->assertTrue($rule->check(''));
    }

    public function testShouldCheckRuleWhenInputIsNotOptional()
    {
        $input = 'foo';

        $validatable = $this->getMock('Respect\\Validation\\Validatable');
        $validatable
            ->expects($this->once())
            ->method('check')
            ->with($input)
            ->will($this->returnValue(true));

        $rule = new Optional($validatable);

        $this->assertTrue($rule->check($input));
    }
}
