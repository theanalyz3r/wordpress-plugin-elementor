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
 * @covers Respect\Validation\Rules\MinimumAge
 * @covers Respect\Validation\Exceptions\MinimumAgeException
 */
class MininumAgeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerForValidDateValidMinimumAge
     */
    public function testValidMinimumAgeInsideBoundsShouldPass($age, $format, $input)
    {
        $minimumAge = new MinimumAge($age, $format);
        $this->assertTrue($minimumAge->__invoke($input));
        $this->assertTrue($minimumAge->assert($input));
        $this->assertTrue($minimumAge->check($input));
    }

    /**
     * @dataProvider providerForValidDateInvalidMinimumAge
     * @expectedException Respect\Validation\Exceptions\MinimumAgeException
     */
    public function testInvalidMinimumAgeShouldThrowException($age, $format, $input)
    {
        $minimumAge = new MinimumAge($age, $format);
        $this->assertFalse($minimumAge->__invoke($input));
        $this->assertFalse($minimumAge->assert($input));
    }

    /**
     * @dataProvider providerForInvalidDate
     * @expectedException Respect\Validation\Exceptions\MinimumAgeException
     */
    public function testInvalidDateShouldNotPass($age, $format, $input)
    {
        $minimumAge = new MinimumAge($age, $format);
        $this->assertFalse($minimumAge->__invoke($input));
        $this->assertFalse($minimumAge->assert($input));
    }

    /**
     * @expectedException Respect\Validation\Exceptions\ComponentException
     * @expectedExceptionMessage The age must be a integer value
     */
    public function testShouldNotAcceptNonIntegerAgeOnConstructor()
    {
        new MinimumAge('L12');
    }

    public function providerForValidDateValidMinimumAge()
    {
        return [
            [18, 'Y-m-d', ''],
            [18, 'Y-m-d', '1969-07-20'],
            [18, null, new \DateTime('1969-07-20')],
            [18, 'Y-m-d', new \DateTime('1969-07-20')],
            ['18', 'Y-m-d', '1969-07-20'],
            [18.0, 'Y-m-d', '1969-07-20'],
        ];
    }

    public function providerForValidDateInvalidMinimumAge()
    {
        return [
            [18, 'Y-m-d', '2002-06-30'],
            [18, null, new \DateTime('2002-06-30')],
            [18, 'Y-m-d', new \DateTime('2002-06-30')],
        ];
    }

    public function providerForInvalidDate()
    {
        return [
            [18, null, 'invalid-input'],
            [18, null, new \stdClass()],
            [18, 'y-m-d', '2002-06-30'],
        ];
    }
}
