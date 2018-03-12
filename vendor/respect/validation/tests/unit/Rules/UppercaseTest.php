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
 * @covers Respect\Validation\Rules\Uppercase
 * @covers Respect\Validation\Exceptions\UppercaseException
 */
class UppercaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerForValidUppercase
     */
    public function testValidUppercaseShouldReturnTrue($input)
    {
        $uppercase = new Uppercase();
        $this->assertTrue($uppercase->validate($input));
        $this->assertTrue($uppercase->assert($input));
        $this->assertTrue($uppercase->check($input));
    }

    /**
     * @dataProvider providerForInvalidUppercase
     * @expectedException Respect\Validation\Exceptions\UppercaseException
     */
    public function testInvalidUppercaseShouldThrowException($input)
    {
        $lowercase = new Uppercase();
        $this->assertFalse($lowercase->validate($input));
        $this->assertFalse($lowercase->assert($input));
    }

    public function providerForValidUppercase()
    {
        return [
            [''],
            ['UPPERCASE'],
            ['UPPERCASE-WITH-DASHES'],
            ['UPPERCASE WITH SPACES'],
            ['UPPERCASE WITH NUMBERS 123'],
            ['UPPERCASE WITH SPECIALS CHARACTERS LIKE Ã Ç Ê'],
            ['WITH SPECIALS CHARACTERS LIKE # $ % & * +'],
            ['ΤΆΧΙΣΤΗ ΑΛΏΠΗΞ ΒΑΦΉΣ ΨΗΜΈΝΗ ΓΗ, ΔΡΑΣΚΕΛΊΖΕΙ ΥΠΈΡ ΝΩΘΡΟΎ ΚΥΝΌΣ'],
        ];
    }

    public function providerForInvalidUppercase()
    {
        return [
            ['lowercase'],
            ['CamelCase'],
            ['First Character Uppercase'],
            ['With Numbers 1 2 3'],
        ];
    }
}
