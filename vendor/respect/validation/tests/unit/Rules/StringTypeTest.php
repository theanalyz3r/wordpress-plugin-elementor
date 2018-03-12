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
 * @covers Respect\Validation\Rules\StringType
 * @covers Respect\Validation\Exceptions\StringTypeException
 */
class StringTypeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerForString
     */
    public function testString($input)
    {
        $rule = new StringType();

        $this->assertTrue($rule->validate($input));
    }

    /**
     * @dataProvider providerForNotString
     */
    public function testNotString($input)
    {
        $rule = new StringType();

        $this->assertFalse($rule->validate($input));
    }

    public function providerForString()
    {
        return [
            [''],
            ['165.7'],
        ];
    }

    public function providerForNotString()
    {
        return [
            [null],
            [[]],
            [new \stdClass()],
            [150],
        ];
    }
}
