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
 * @covers Respect\Validation\Rules\FalseVal
 * @covers Respect\Validation\Exceptions\FalseValException
 */
class FalseValTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validFalseProvider
     */
    public function testShouldValidatePatternAccordingToTheDefinedLocale($input)
    {
        $rule = new FalseVal();

        $this->assertTrue($rule->validate($input));
    }

    public function validFalseProvider()
    {
        return [
            [false],
            [0],
            ['0'],
            ['false'],
            ['off'],
            ['no'],
            ['FALSE'],
            ['OFF'],
            ['NO'],
            ['False'],
            ['Off'],
            ['No'],
        ];
    }

    /**
     * @dataProvider invalidFalseProvider
     */
    public function testShouldNotValidatePatternAccordingToTheDefinedLocale($input)
    {
        $rule = new FalseVal();

        $this->assertFalse($rule->validate($input));
    }

    public function invalidFalseProvider()
    {
        return [
            [true],
            [1],
            ['1'],
            [0.5],
            [2],
            ['true'],
            ['on'],
            ['yes'],
            ['anything'],
        ];
    }
}
