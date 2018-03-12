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

class AbstractRegexRuleTest extends \PHPUnit_Framework_TestCase
{
    public function testValidateCleanShouldReturnOneIfPatternIsFound()
    {
        $regexRuleMock = $this->getMockForAbstractClass('Respect\\Validation\\Rules\\AbstractRegexRule');
        $regexRuleMock->expects($this->once())
            ->method('getPregFormat')
            ->will($this->returnValue('/^Respect$/'));

        $this->assertEquals(1, $regexRuleMock->validateClean('Respect'));
    }

    public function testValidateCleanShouldReturnZeroIfPatternIsNotFound()
    {
        $regexRuleMock = $this->getMockForAbstractClass('Respect\\Validation\\Rules\\AbstractRegexRule');
        $regexRuleMock->expects($this->once())
            ->method('getPregFormat')
            ->will($this->returnValue('/^Respect$/'));

        $this->assertEquals(0, $regexRuleMock->validateClean('Validation'));
    }
}
