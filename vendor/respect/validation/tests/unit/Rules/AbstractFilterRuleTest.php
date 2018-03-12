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

class AbstractFilterRuleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException Respect\Validation\Exceptions\ComponentException
     * @expectedExceptionMessage Invalid list of additional characters to be loaded
     */
    public function testConstructorShouldThrowExceptionIfParamIsNotString()
    {
        $this->getMockForAbstractClass('Respect\\Validation\\Rules\\AbstractFilterRule', [1]);
    }

    public function testValidateShouldReturnTrueForValidArguments()
    {
        $filterRuleMock = $this->getMockForAbstractClass('Respect\\Validation\\Rules\\AbstractFilterRule');
        $filterRuleMock->expects($this->any())
            ->method('validateClean')
            ->will($this->returnValue(true));

        $this->assertTrue($filterRuleMock->validate('hey'));
    }

    public function testValidateShouldReturnFalseForInvalidArguments()
    {
        $filterRuleMock = $this->getMockForAbstractClass('Respect\\Validation\\Rules\\AbstractFilterRule');
        $filterRuleMock->expects($this->any())
            ->method('validateClean')
            ->will($this->returnValue(true));

        $this->assertFalse($filterRuleMock->validate(''));
        $this->assertFalse($filterRuleMock->validate([]));
    }
}
