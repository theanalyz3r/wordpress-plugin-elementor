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
 * @covers Respect\Validation\Rules\Charset
 * @covers Respect\Validation\Exceptions\CharsetException
 */
class CharsetTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider providerForValidCharset
     */
    public function testValidDataWithCharsetShouldReturnTrue($charset, $input)
    {
        $validator = new Charset($charset);
        $this->assertTrue($validator->__invoke($input));
    }

    /**
     * @dataProvider providerForInvalidCharset
     * @expectedException Respect\Validation\Exceptions\CharsetException
     */
    public function testInvalidCharsetShouldFailAndThrowCharsetException($charset, $input)
    {
        $validator = new Charset($charset);
        $this->assertFalse($validator->__invoke($input));
        $this->assertFalse($validator->assert($input));
    }

    /**
     * @dataProvider providerForInvalidParams
     * @expectedException Respect\Validation\Exceptions\ComponentException
     */
    public function testInvalidConstructorParamsShouldThrowComponentExceptionUponInstantiation($charset)
    {
        $validator = new Charset($charset);
    }

    public function providerForInvalidParams()
    {
        return [
            [new \stdClass()],
            [[]],
            [null],
            ['16'],
            ['aeiou'],
            ['a'],
            ['Foo'],
            ['basic'],
            [10],
        ];
    }

    public function providerForValidCharset()
    {
        return [
            ['UTF-8', ''],
            ['ISO-8859-1', mb_convert_encoding('açaí', 'ISO-8859-1')],
            [['UTF-8', 'ASCII'], 'strawberry'],
            ['ASCII', mb_convert_encoding('strawberry', 'ASCII')],
            ['UTF-8', '日本国'],
            [['ISO-8859-1', 'EUC-JP'], '日本国'],
            ['UTF-8', 'açaí'],
            ['ISO-8859-1', 'açaí'],
        ];
    }

    public function providerForInvalidCharset()
    {
        return [
            ['ASCII', '日本国'],
            ['ASCII', 'açaí'],
        ];
    }
}
