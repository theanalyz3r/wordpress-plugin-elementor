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

class AbstractCtypeRuleTest extends \PHPUnit_Framework_TestCase
{
    public function testValidateCleanShouldReturnTrueWhenCtypeFunctionReturnsTrue()
    {
        $ctypeRuleMock = $this->getMockForAbstractClass('Respect\\Validation\\Rules\\AbstractCtypeRule');
        $ctypeRuleMock->expects($this->once())
            ->method('ctypeFunction')
            ->will($this->returnValue(true));

        $this->assertTrue($ctypeRuleMock->validateClean('anything'));
    }

    public function testValidateCleanShouldReturnFalseWhenCtypeFunctionReturnsFalse()
    {
        $ctypeRuleMock = $this->getMockForAbstractClass('Respect\\Validation\\Rules\\AbstractCtypeRule');
        $ctypeRuleMock->expects($this->once())
            ->method('ctypeFunction')
            ->will($this->returnValue(false));

        $this->assertFalse($ctypeRuleMock->validateClean('anything'));
    }
}
