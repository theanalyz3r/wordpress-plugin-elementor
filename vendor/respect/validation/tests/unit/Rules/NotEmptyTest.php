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
 * @covers Respect\Validation\Rules\NotEmpty
 * @covers Respect\Validation\Exceptions\NotEmptyException
 */
class NotEmptyTest extends \PHPUnit_Framework_TestCase
{
    protected $object;

    protected function setUp()
    {
        $this->object = new NotEmpty();
    }

    /**
     * @dataProvider providerForNotEmpty
     */
    public function testStringNotEmpty($input)
    {
        $this->assertTrue($this->object->assert($input));
    }

    /**
     * @dataProvider providerForEmpty
     * @expectedException Respect\Validation\Exceptions\NotEmptyException
     */
    public function testStringEmpty($input)
    {
        $this->assertFalse($this->object->assert($input));
    }

    public function providerForNotEmpty()
    {
        return [
            [1],
            [' oi'],
            [[5]],
            [[0]],
            [new \stdClass()],
        ];
    }

    public function providerForEmpty()
    {
        return [
            [''],
            ['    '],
            ["\n"],
            [false],
            [null],
            [[]],
        ];
    }
}
