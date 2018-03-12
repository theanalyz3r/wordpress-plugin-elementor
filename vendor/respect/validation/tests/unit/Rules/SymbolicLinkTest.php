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

$GLOBALS['is_link'] = null;

function is_link($link)
{
    $return = \is_link($link);
    if (null !== $GLOBALS['is_link']) {
        $return = $GLOBALS['is_link'];
        $GLOBALS['is_link'] = null;
    }

    return $return;
}

/**
 * @group  rule
 * @covers Respect\Validation\Rules\SymbolicLink
 * @covers Respect\Validation\Exceptions\SymbolicLinkException
 */
class SymbolicLinkTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers Respect\Validation\Rules\SymbolicLink::validate
     */
    public function testValidSymbolicLinkShouldReturnTrue()
    {
        $GLOBALS['is_link'] = true;

        $rule = new SymbolicLink();
        $input = '/path/of/a/valid/link.lnk';
        $this->assertTrue($rule->validate($input));
    }

    /**
     * @covers Respect\Validation\Rules\SymbolicLink::validate
     */
    public function testInvalidSymbolicLinkShouldThrowException()
    {
        $GLOBALS['is_link'] = false;

        $rule = new SymbolicLink();
        $input = '/path/of/an/invalid/link.lnk';
        $this->assertFalse($rule->validate($input));
    }

    /**
     * @covers Respect\Validation\Rules\SymbolicLink::validate
     */
    public function testShouldValidateObjects()
    {
        $rule = new SymbolicLink();
        $object = $this->getMock('SplFileInfo', ['isLink'], ['somelink.lnk']);
        $object->expects($this->once())
                ->method('isLink')
                ->will($this->returnValue(true));

        $this->assertTrue($rule->validate($object));
    }
}
