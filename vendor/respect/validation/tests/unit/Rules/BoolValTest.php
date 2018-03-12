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
 * @covers Respect\Validation\Rules\BoolVal
 */
class BoolValTest extends RuleTestCase
{
    public function providerForValidInput()
    {
        $rule = new BoolVal();

        return [
            [$rule, true],
            [$rule, 1],
            [$rule, 'on'],
            [$rule, 'yes'],
            [$rule, 0],
            [$rule, false],
            [$rule, 'off'],
            [$rule, 'no '],
            [$rule, ''],
        ];
    }

    public function providerForInvalidInput()
    {
        $rule = new BoolVal();

        return [
            [$rule, 'ok'],
            [$rule, 'yep'],
            [$rule, 10],
        ];
    }
}
