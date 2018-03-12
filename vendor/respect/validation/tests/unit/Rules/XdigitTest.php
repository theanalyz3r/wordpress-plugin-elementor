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
 * @covers Respect\Validation\Rules\Xdigit
 * @covers Respect\Validation\Exceptions\XdigitException
 */
class XdigitTest extends \PHPUnit_Framework_TestCase
{
    protected $xdigitsValidator;

    protected function setUp()
    {
        $this->xdigitsValidator = new Xdigit();
    }

    /**
     * @dataProvider providerForXdigit
     */
    public function testValidateValidHexasdecimalDigits($input)
    {
        $this->assertTrue($this->xdigitsValidator->assert($input));
        $this->assertTrue($this->xdigitsValidator->check($input));
        $this->assertTrue($this->xdigitsValidator->validate($input));
    }

    /**
     * @dataProvider providerForNotXdigit
     * @expectedException Respect\Validation\Exceptions\XdigitException
     */
    public function testInvalidHexadecimalDigitsShouldThrowXdigitException($input)
    {
        $this->assertFalse($this->xdigitsValidator->validate($input));
        $this->assertFalse($this->xdigitsValidator->assert($input));
    }

    /**
     * @dataProvider providerAdditionalChars
     */
    public function testAdditionalCharsShouldBeRespected($additional, $query)
    {
        $validator = new Xdigit($additional);
        $this->assertTrue($validator->validate($query));
    }

    public function providerAdditionalChars()
    {
        return [
            ['!@#$%^&*(){} ', '!@#$%^&*(){} abc 123'],
            ["[]?+=/\\-_|\"',<>. \t\n", "[]?+=/\\-_|\"',<>. \t \n abc 123"],
        ];
    }

    public function providerForXdigit()
    {
        return [
            ['FFF'],
            ['15'],
            ['DE12FA'],
            ['1234567890abcdef'],
            [0x123],
        ];
    }

    public function providerForNotXdigit()
    {
        return [
            [''],
            [null],
            ['j'],
            [' '],
            ['Foo'],
            ['1.5'],
        ];
    }
}
