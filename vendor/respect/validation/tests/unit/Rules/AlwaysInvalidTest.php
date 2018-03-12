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
 * @covers Respect\Validation\Rules\AlwaysInvalid
 */
class AlwaysInvalidTest extends \PHPUnit_Framework_TestCase
{
    public function providerForValidAlwaysInvalid()
    {
        return [
            [0],
            [1],
            ['string'],
            [true],
            [false],
            [null],
            [''],
            [[]],
            [['array_full']],
        ];
    }

    /**
     * @dataProvider providerForValidAlwaysInvalid
     */
    public function testShouldValidateInputWhenItIsAValidAlwaysInvalid($input)
    {
        $rule = new AlwaysInvalid();

        $this->assertFalse($rule->validate($input));
    }
}
