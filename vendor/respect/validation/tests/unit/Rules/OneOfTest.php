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
 * @covers Respect\Validation\Rules\OneOf
 * @covers Respect\Validation\Exceptions\OneOfException
 */
class OneOfTest extends \PHPUnit_Framework_TestCase
{
    public function testValid()
    {
        $valid1 = new Callback(function () {
                    return false;
                });
        $valid2 = new Callback(function () {
                    return true;
                });
        $valid3 = new Callback(function () {
                    return false;
                });
        $o = new OneOf($valid1, $valid2, $valid3);
        $this->assertTrue($o->validate('any'));
        $this->assertTrue($o->assert('any'));
        $this->assertTrue($o->check('any'));
    }

    /**
     * @expectedException Respect\Validation\Exceptions\OneOfException
     */
    public function testInvalid()
    {
        $valid1 = new Callback(function () {
                    return false;
                });
        $valid2 = new Callback(function () {
                    return false;
                });
        $valid3 = new Callback(function () {
                    return false;
                });
        $o = new OneOf($valid1, $valid2, $valid3);
        $this->assertFalse($o->validate('any'));
        $this->assertFalse($o->assert('any'));
    }

    /**
     * @expectedException Respect\Validation\Exceptions\XdigitException
     */
    public function testInvalidCheck()
    {
        $o = new OneOf(new Xdigit(), new Alnum());
        $this->assertFalse($o->validate(-10));
        $this->assertFalse($o->check(-10));
    }
}
