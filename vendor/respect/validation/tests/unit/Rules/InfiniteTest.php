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
 * @covers Respect\Validation\Rules\Infinite
 * @covers Respect\Validation\Exceptions\InfiniteException
 */
class InfiniteTest extends \PHPUnit_Framework_TestCase
{
    protected $rule;

    protected function setUp()
    {
        $this->rule = new Infinite();
    }

    /**
     * @dataProvider providerForInfinite
     */
    public function testShouldValidateInfiniteNumbers($input)
    {
        $this->assertTrue($this->rule->validate($input));
    }

    /**
     * @dataProvider providerForNonInfinite
     */
    public function testShouldNotValidateNonInfiniteNumbers($input)
    {
        $this->assertFalse($this->rule->validate($input));
    }

    /**
     * @expectedException Respect\Validation\Exceptions\InfiniteException
     * @expectedExceptionMessage 123456 must be an infinite number
     */
    public function testShouldThrowInfiniteExceptionWhenChecking()
    {
        $this->rule->check(123456);
    }

    public function providerForInfinite()
    {
        return [
            [INF],
            [INF * -1],
        ];
    }

    public function providerForNonInfinite()
    {
        return [
            [' '],
            [[]],
            [new \stdClass()],
            [null],
            ['123456'],
            [-9],
            [0],
            [16],
            [2],
            [PHP_INT_MAX],
        ];
    }
}
