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
 * @covers Respect\Validation\Rules\Even
 * @covers Respect\Validation\Exceptions\EvenException
 */
class EvenTest extends \PHPUnit_Framework_TestCase
{
    protected $evenValidator;

    protected function setUp()
    {
        $this->evenValidator = new Even();
    }

    /**
     * @dataProvider providerForEven
     */
    public function testEvenNumbersShouldPass($input)
    {
        $this->assertTrue($this->evenValidator->validate($input));
        $this->assertTrue($this->evenValidator->check($input));
        $this->assertTrue($this->evenValidator->assert($input));
    }

    /**
     * @dataProvider providerForNotEven
     * @expectedException Respect\Validation\Exceptions\EvenException
     */
    public function testNotEvenNumbersShouldFail($input)
    {
        $this->assertFalse($this->evenValidator->validate($input));
        $this->assertFalse($this->evenValidator->assert($input));
    }

    public function providerForEven()
    {
        return [
            [''],
            [-2],
            [-0],
            [0],
            [32],
        ];
    }

    public function providerForNotEven()
    {
        return [
            [-5],
            [-1],
            [1],
            [13],
        ];
    }
}
