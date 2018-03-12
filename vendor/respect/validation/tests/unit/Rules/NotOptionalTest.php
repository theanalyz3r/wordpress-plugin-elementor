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
 * @covers Respect\Validation\Rules\NotOptional
 */
class NotOptionalTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerForNotOptional
     */
    public function testShouldValidateWhenNotOptional($input)
    {
        $rule = new NotOptional();

        $this->assertTrue($rule->validate($input));
    }

    /**
     * @dataProvider providerForOptional
     */
    public function testShouldNotValidateWhenOptional($input)
    {
        $rule = new NotOptional();

        $this->assertFalse($rule->validate($input));
    }

    public function providerForNotOptional()
    {
        return [
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

    public function providerForOptional()
    {
        return [
            [null],
            [''],
        ];
    }
}
