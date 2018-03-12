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
 * @covers Respect\Validation\Rules\Roman
 * @covers Respect\Validation\Exceptions\RomanException
 */
class RomanTest extends \PHPUnit_Framework_TestCase
{
    protected $romanValidator;

    protected function setUp()
    {
        $this->romanValidator = new Roman();
    }

    /**
     * @dataProvider providerForRoman
     */
    public function testValidRomansShouldReturnTrue($input)
    {
        $this->assertTrue($this->romanValidator->__invoke($input));
        $this->assertTrue($this->romanValidator->assert($input));
        $this->assertTrue($this->romanValidator->check($input));
    }

    /**
     * @dataProvider providerForNotRoman
     * @expectedException Respect\Validation\Exceptions\RomanException
     */
    public function testInvalidRomansShouldThrowRomanException($input)
    {
        $this->assertFalse($this->romanValidator->__invoke($input));
        $this->assertFalse($this->romanValidator->assert($input));
    }

    public function providerForRoman()
    {
        return [
            [''],
            ['III'],
            ['IV'],
            ['VI'],
            ['XIX'],
            ['XLII'],
            ['LXII'],
            ['CXLIX'],
            ['CLIII'],
            ['MCCXXXIV'],
            ['MMXXIV'],
            ['MCMLXXV'],
            ['MMMMCMXCIX'],
        ];
    }

    public function providerForNotRoman()
    {
        return [
            [' '],
            ['IIII'],
            ['IVVVX'],
            ['CCDC'], //
            ['MXM'],
            ['XIIIIIIII'],
            ['MIMIMI'],
        ];
    }
}
