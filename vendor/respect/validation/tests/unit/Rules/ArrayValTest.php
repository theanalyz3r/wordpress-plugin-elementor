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
 * @covers Respect\Validation\Rules\ArrayVal
 */
class ArrayValTest extends RuleTestCase
{
    public function providerForValidInput()
    {
        $rule = new ArrayVal();

        return [
            [$rule, []],
            [$rule, [1, 2, 3]],
            [$rule, new \ArrayObject()],
        ];
    }

    public function providerForInvalidInput()
    {
        $rule = new ArrayVal();

        return [
            [$rule, ''],
            [$rule, null],
            [$rule, 121],
            [$rule, new \stdClass()],
            [$rule, false],
            [$rule, 'aaa'],
        ];
    }
}
