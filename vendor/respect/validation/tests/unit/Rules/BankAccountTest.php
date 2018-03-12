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
 * @covers Respect\Validation\Rules\BankAccount
 * @covers Respect\Validation\Exceptions\BankAccountException
 */
class BankAccountTest extends LocaleTestCase
{
    public function testShouldUseDefinedFactoryToCreateInternalRuleBasedOnGivenCountryCode()
    {
        $countryCode = 'XX';
        $bank = '123456';

        $validatable = $this->getMock('Respect\Validation\Validatable');
        $factory = $this->getMock('Respect\Validation\Rules\Locale\Factory');
        $factory
            ->expects($this->once())
            ->method('bankAccount')
            ->with($countryCode, $bank)
            ->will($this->returnValue($validatable));

        $rule = new BankAccount($countryCode, $bank, $factory);

        $this->assertSame($validatable, $rule->getValidatable());
    }

    public function testShouldUseDefaultFactoryToCreateInternalRuleBasedOnGivenCountryCodeWhenFactoryIsNotDefined()
    {
        $countryCode = 'DE';
        $bank = '123456';
        $rule = new BankAccount($countryCode, $bank);

        $this->assertInstanceOf('Respect\Validation\Rules\Locale\GermanBankAccount', $rule->getValidatable());
    }
}
