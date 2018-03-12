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
 * @covers Respect\Validation\Rules\LanguageCode
 */
class LanguageCodeTest extends RuleTestCase
{
    public function providerForValidInput()
    {
        $ruleAlpha2 = new LanguageCode();
        $ruleAlpha3 = new LanguageCode('alpha-3');

        return [
            [$ruleAlpha2, 'pt'],
            [$ruleAlpha3, 'por'],
            [$ruleAlpha2, 'en'],
            [$ruleAlpha3, 'eng'],
            [$ruleAlpha2, 'it'],
            [$ruleAlpha3, 'ita'],
            [$ruleAlpha2, 'la'],
            [$ruleAlpha3, 'lat'],
        ];
    }

    public function providerForInvalidInput()
    {
        $ruleAlpha2 = new LanguageCode();
        $ruleAlpha3 = new LanguageCode('alpha-3');

        return [
            [$ruleAlpha2, 'por'],
            [$ruleAlpha2, ''],
            [$ruleAlpha2, null],
            [$ruleAlpha2, false],
            [$ruleAlpha2, []],
            [$ruleAlpha3, 'pt'],
        ];
    }
}
