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
 * @covers Respect\Validation\Rules\Tld
 */
class TldTest extends \PHPUnit_Framework_TestCase
{
    public function providerForValidTld()
    {
        return [
            ['com'],
            ['cafe'],
            ['democrat'],
            ['br'],
            ['us'],
            ['eu'],
        ];
    }

    /**
     * @dataProvider providerForValidTld
     */
    public function testShouldValidateInputWhenItIsAValidTld($input)
    {
        $rule = new Tld();

        $this->assertTrue($rule->validate($input));
    }

    public function providerForInvalidTld()
    {
        return [
            ['1'],
            [1.0],
            ['wrongtld'],
            [true],
        ];
    }

    /**
     * @dataProvider providerForInvalidTld
     */
    public function testShouldInvalidateInputWhenItIsNotAValidTld($input)
    {
        $rule = new Tld();

        $this->assertFalse($rule->validate($input));
    }
}
