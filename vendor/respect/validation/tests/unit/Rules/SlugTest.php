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
 * @covers Respect\Validation\Rules\Slug
 */
class SlugTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerValidSlug
     */
    public function testValidSlug($input)
    {
        $rule = new Slug();

        $this->assertTrue($rule->validate($input));
    }

    /**
     * @dataProvider providerInvalidSlug
     */
    public function testInvalidSlug($input)
    {
        $rule = new Slug();

        $this->assertFalse($rule->validate($input));
    }

    public function providerValidSlug()
    {
        return [
            ['o-rato-roeu-o-rei-de-roma'],
            ['o-alganet-e-um-feio'],
            ['a-e-i-o-u'],
            ['anticonstitucionalissimamente'],
        ];
    }

    public function providerInvalidSlug()
    {
        return [
            [''],
            ['o-alganet-é-um-feio'],
            ['á-é-í-ó-ú'],
            ['-assim-nao-pode'],
            ['assim-tambem-nao-'],
            ['nem--assim'],
            ['--nem-assim'],
            ['Nem mesmo Assim'],
            ['Ou-ate-assim'],
            ['-Se juntar-tudo-Então-'],
        ];
    }
}
