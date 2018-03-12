<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Respect\Validation;

class ValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function testStaticCreateShouldReturnNewValidator()
    {
        $this->assertInstanceOf('Respect\Validation\Validator', Validator::create());
    }

    public function testInvalidRuleClassShouldThrowComponentException()
    {
        $this->setExpectedException('Respect\Validation\Exceptions\ComponentException');
        Validator::iDoNotExistSoIShouldThrowException();
    }

    /**
     * Regression test #174.
     */
    public function testShouldReturnValidatorInstanceWhenTheNotRuleIsCalledWithArguments()
    {
        $validator = new Validator();

        $this->assertSame($validator, $validator->not($validator->notEmpty()));
    }
}
