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
 * @covers Respect\Validation\Rules\Countable
 */
class CountableTest extends RuleTestCase
{
    public function providerForValidInput()
    {
        $rule = new Countable();

        return [
            [$rule, []],
            [$rule, new \ArrayObject()],
            [$rule, new \ArrayIterator()],
        ];
    }

    public function providerForInvalidInput()
    {
        $rule = new Countable();

        return [
            [$rule, '1'],
            [$rule, 1.0],
            [$rule, new \stdClass()],
            [$rule, PHP_INT_MAX],
            [$rule, true],
        ];
    }
}
