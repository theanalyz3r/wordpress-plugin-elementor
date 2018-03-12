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
 * @covers Respect\Validation\Rules\Call
 * @covers Respect\Validation\Exceptions\CallException
 */
class CallTest extends \PHPUnit_Framework_TestCase
{
    public function thisIsASampleCallbackUsedInsideThisTest()
    {
        return [];
    }

    public function testCallbackValidatorShouldAcceptEmptyString()
    {
        $v = new Call('str_split', new ArrayVal());
        $this->assertTrue($v->assert(''));
    }

    public function testCallbackValidatorShouldAcceptStringWithFunctionName()
    {
        $v = new Call('str_split', new ArrayVal());
        $this->assertTrue($v->assert('test'));
    }

    public function testCallbackValidatorShouldAcceptArrayCallbackDefinition()
    {
        $v = new Call([$this, 'thisIsASampleCallbackUsedInsideThisTest'], new ArrayVal());
        $this->assertTrue($v->assert('test'));
    }

    public function testCallbackValidatorShouldAcceptClosures()
    {
        $v = new Call(function () {
                    return [];
                }, new ArrayVal());
        $this->assertTrue($v->assert('test'));
    }

    /**
     * @expectedException Respect\Validation\Exceptions\CallException
     */
    public function testCallbackFailedShouldThrowCallException()
    {
        $v = new Call('strrev', new ArrayVal());
        $this->assertFalse($v->validate('test'));
        $this->assertFalse($v->assert('test'));
    }
}
