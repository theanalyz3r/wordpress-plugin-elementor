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
 * @covers Respect\Validation\Rules\FloatType
 */
class FloatTypeTest extends RuleTestCase
{
    public function providerForValidInput()
    {
        $rule = new FloatType();

        return [
            [$rule, 165.23],
            [$rule, 1.3e3],
            [$rule, 7E-10],
            [$rule, 0.0],
            [$rule, -2.44],
            [$rule, 10 / 33.33],
            [$rule, PHP_INT_MAX + 1],
        ];
    }

    public function providerForInvalidInput()
    {
        $rule = new FloatType();

        return [
            [$rule, '1'],
            [$rule, '1.0'],
            [$rule, '7E-10'],
            [$rule, 111111],
            [$rule, PHP_INT_MAX * -1],
        ];
    }
}
