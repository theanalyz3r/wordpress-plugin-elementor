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
 * @covers Respect\Validation\Rules\AlwaysValid
 */
class AlwaysValidTest extends \PHPUnit_Framework_TestCase
{
    public function providerForValidAlwaysValid()
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
     * @dataProvider providerForValidAlwaysValid
     */
    public function testShouldValidateInputWhenItIsAValidAlwaysValid($input)
    {
        $rule = new AlwaysValid();

        $this->assertTrue($rule->validate($input));
    }
}
