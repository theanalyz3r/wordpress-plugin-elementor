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
 * @covers Respect\Validation\Rules\CurrencyCode
 */
class CurrencyCodeTest extends RuleTestCase
{
    public function providerForValidInput()
    {
        $rule = new CurrencyCode();

        return [
            [$rule, 'EUR'],
            [$rule, 'GBP'],
            [$rule, 'XAU'],
            [$rule, 'xba'],
            [$rule, 'xxx'],
        ];
    }

    public function providerForInvalidInput()
    {
        $rule = new CurrencyCode();

        return [
            [$rule, 'BTC'],
            [$rule, 'GGP'],
            [$rule, 'USA'],
        ];
    }
}
