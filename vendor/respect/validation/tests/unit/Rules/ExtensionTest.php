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

use PHPUnit_Framework_TestCase;
use SplFileInfo;

/**
 * @author Henrique Moody <henriquemoody@gmail.com>
 * @group  rule
 * @covers Respect\Validation\Rules\Extension
 * @covers Respect\Validation\Exceptions\ExtensionException
 */
class ExtensionTest extends PHPUnit_Framework_TestCase
{
    public function providerValidExtension()
    {
        return [
            ['filename.txt', 'txt'],
            ['filename.jpg', 'jpg'],
            ['filename.inc.php', 'php'],
            ['filename.foo.bar.bz2', 'bz2'],
        ];
    }

    /**
     * @dataProvider providerValidExtension
     */
    public function testShouldValidateExtension($filename, $extension)
    {
        $rule = new Extension($extension);

        $this->assertTrue($rule->validate($filename));
    }

    public function testShouldAcceptSplFileInfo()
    {
        $fileInfo = new SplFileInfo(__FILE__);

        $rule = new Extension('php');

        $this->assertTrue($rule->validate($fileInfo));
    }

    public function testShouldInvalidWhenNotStringNorSplFileInfo()
    {
        $nonFile = [__FILE__];

        $rule = new Extension('php');

        $this->assertFalse($rule->validate($nonFile));
    }

    /**
     * @expectedException Respect\Validation\Exceptions\ExtensionException
     * @expectedExceptionMessage "filename.jpg" must have "png" extension
     */
    public function testShouldThrowExtensionExceptionWhenCheckingValue()
    {
        $rule = new Extension('png');
        $rule->check('filename.jpg');
    }
}
