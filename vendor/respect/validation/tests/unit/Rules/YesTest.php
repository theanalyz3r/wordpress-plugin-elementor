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
 * @covers Respect\Validation\Rules\Yes
 * @covers Respect\Validation\Exceptions\YesException
 */
class YesTest extends \PHPUnit_Framework_TestCase
{
    public function testShouldUseDefaultPattern()
    {
        $rule = new Yes();

        $actualPattern = $rule->regex;
        $expectedPattern = '/^y(eah?|ep|es)?$/i';

        $this->assertEquals($expectedPattern, $actualPattern);
    }

    public function testShouldUseLocalPatternForYesExpressionWhenDefined()
    {
        if (!defined('YESEXPR')) {
            $this->markTestSkipped('Constant YESEXPR is not defined');

            return;
        }

        $rule = new Yes(true);

        $actualPattern = $rule->regex;
        $expectedPattern = '/'.nl_langinfo(YESEXPR).'/i';

        $this->assertEquals($expectedPattern, $actualPattern);
    }

    /**
     * @dataProvider validYesProvider
     */
    public function testShouldValidatePatternAccordingToTheDefinedLocale($input)
    {
        $rule = new Yes();

        $this->assertTrue($rule->validate($input));
    }

    public function validYesProvider()
    {
        return [
            ['Y'],
            ['Yea'],
            ['Yeah'],
            ['Yep'],
            ['Yes'],
        ];
    }

    /**
     * @dataProvider invalidYesProvider
     */
    public function testShouldNotValidatePatternAccordingToTheDefinedLocale($input)
    {
        $rule = new Yes();

        $this->assertFalse($rule->validate($input));
    }

    public function invalidYesProvider()
    {
        return [
            ['Si'],
            ['Sim'],
            ['Yoo'],
            ['Young'],
            ['Yy'],
        ];
    }
}
