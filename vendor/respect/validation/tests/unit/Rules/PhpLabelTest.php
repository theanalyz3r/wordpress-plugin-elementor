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
 * @covers Respect\Validation\Rules\PhpLabel
 * @covers Respect\Validation\Exceptions\PhpLabelException
 */
class PhpLabelTest extends RuleTestCase
{
    public function providerForValidInput()
    {
        $rule = new PhpLabel();

        return [
            [$rule, '_'],
            [$rule, 'foo'],
            [$rule, 'f00'],
            [$rule, uniqid('_')],
            [$rule, uniqid('a')],
            [$rule, strtoupper(uniqid('_'))],
            [$rule, strtoupper(uniqid('a'))],
        ];
    }

    public function providerForInvalidInput()
    {
        $rule = new PhpLabel();

        return [
            [$rule, '%'],
            [$rule, '*'],
            [$rule, '-'],
            [$rule, 'f-o-o-'],
            [$rule, "\n"],
            [$rule, "\r"],
            [$rule, "\t"],
            [$rule, ' '],
            [$rule, 'f o o'],
            [$rule, '0ne'],
            [$rule, '0_ne'],
            [$rule, uniqid(mt_rand(0, 9))],
            [$rule, null],
            [$rule, mt_rand()],
            [$rule, 0],
            [$rule, 1],
            [$rule, []],
            [$rule, new \StdClass()],
            [$rule, new \DateTime()],
        ];
    }
}
