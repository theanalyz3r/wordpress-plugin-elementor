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
 * @covers Respect\Validation\Rules\MacAddress
 * @covers Respect\Validation\Exceptions\MacAddressException
 */
class MacAddressTest extends \PHPUnit_Framework_TestCase
{
    protected $macaddressValidator;

    protected function setUp()
    {
        $this->macaddressValidator = new MacAddress();
    }

    /**
     * @dataProvider providerForMacAddress
     */
    public function testValidMacaddressesShouldReturnTrue($input)
    {
        $this->assertTrue($this->macaddressValidator->__invoke($input));
        $this->assertTrue($this->macaddressValidator->assert($input));
        $this->assertTrue($this->macaddressValidator->check($input));
    }

    /**
     * @dataProvider providerForNotMacAddress
     * @expectedException Respect\Validation\Exceptions\MacAddressException
     */
    public function testInvalidMacaddressShouldThrowMacAddressException($input)
    {
        $this->assertFalse($this->macaddressValidator->__invoke($input));
        $this->assertFalse($this->macaddressValidator->assert($input));
    }

    public function providerForMacAddress()
    {
        return [
            ['00:11:22:33:44:55'],
            ['66-77-88-99-aa-bb'],
            ['AF:0F:bd:12:44:ba'],
            ['90-bc-d3-1a-dd-cc'],
        ];
    }

    public function providerForNotMacAddress()
    {
        return [
            [''],
            ['00-1122:33:44:55'],
            ['66-77--99-jj-bb'],
            ['HH:0F-bd:12:44:ba'],
            ['90-bc-nk:1a-dd-cc'],
        ];
    }
}
