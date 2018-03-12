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
 * @covers Respect\Validation\Rules\Lowercase
 * @covers Respect\Validation\Exceptions\LowercaseException
 */
class LowercaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerForValidLowercase
     */
    public function testValidLowercaseShouldReturnTrue($input)
    {
        $lowercase = new Lowercase();
        $this->assertTrue($lowercase->__invoke($input));
        $this->assertTrue($lowercase->assert($input));
        $this->assertTrue($lowercase->check($input));
    }

    /**
     * @dataProvider providerForInvalidLowercase
     * @expectedException Respect\Validation\Exceptions\LowercaseException
     */
    public function testInvalidLowercaseShouldThrowException($input)
    {
        $lowercase = new Lowercase();
        $this->assertFalse($lowercase->__invoke($input));
        $this->assertFalse($lowercase->assert($input));
    }

    public function providerForValidLowercase()
    {
        return [
            [''],
            ['lowercase'],
            ['lowercase-with-dashes'],
            ['lowercase with spaces'],
            ['lowercase with numbers 123'],
            ['lowercase with specials characters like ã ç ê'],
            ['with specials characters like # $ % & * +'],
            ['τάχιστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός'],
        ];
    }

    public function providerForInvalidLowercase()
    {
        return [
            ['UPPERCASE'],
            ['CamelCase'],
            ['First Character Uppercase'],
            ['With Numbers 1 2 3'],
        ];
    }
}
