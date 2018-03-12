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
 * @covers Respect\Validation\Rules\NoWhitespace
 * @covers Respect\Validation\Exceptions\NoWhitespaceException
 */
class NoWhitespaceTest extends \PHPUnit_Framework_TestCase
{
    protected $noWhitespaceValidator;

    protected function setUp()
    {
        $this->noWhitespaceValidator = new NoWhitespace();
    }

    /**
     * @dataProvider providerForPass
     */
    public function testStringWithNoWhitespaceShouldPass($input)
    {
        $this->assertTrue($this->noWhitespaceValidator->__invoke($input));
        $this->assertTrue($this->noWhitespaceValidator->check($input));
        $this->assertTrue($this->noWhitespaceValidator->assert($input));
    }

    /**
     * @dataProvider providerForFail
     * @expectedException Respect\Validation\Exceptions\NoWhitespaceException
     */
    public function testStringWithWhitespaceShouldFail($input)
    {
        $this->assertFalse($this->noWhitespaceValidator->__invoke($input));
        $this->assertFalse($this->noWhitespaceValidator->assert($input));
    }
    /**
     * @expectedException Respect\Validation\Exceptions\NoWhitespaceException
     */
    public function testStringWithLineBreaksShouldFail()
    {
        $this->assertFalse($this->noWhitespaceValidator->__invoke("w\npoiur"));
        $this->assertFalse($this->noWhitespaceValidator->assert("w\npoiur"));
    }

    public function providerForPass()
    {
        return [
            [''],
            [null],
            [0],
            ['wpoiur'],
            ['Foo'],
        ];
    }

    public function providerForFail()
    {
        return [
            [' '],
            ['w poiur'],
            ['      '],
            ["Foo\nBar"],
            ["Foo\tBar"],
        ];
    }

    /**
     * @issue 346
     * @expectedException Respect\Validation\Exceptions\NoWhitespaceException
     */
    public function testArrayDoesNotThrowAWarning()
    {
        $this->noWhitespaceValidator->assert([]);
    }
}
