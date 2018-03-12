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
 * @covers Respect\Validation\Rules\IterableType
 */
class IterableTest extends RuleTestCase
{
    public function providerForValidInput()
    {
        $rule = new IterableType();

        return [
            [$rule, [1, 2, 3]],
            [$rule, new \stdClass()],
            [$rule, new \ArrayIterator()],
        ];
    }

    public function providerForInvalidInput()
    {
        $rule = new IterableType();

        return [
            [$rule, 3],
            [$rule, 'asdf'],
            [$rule, 9.85],
            [$rule, null],
            [$rule, true],
        ];
    }
}
