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
 * @covers Respect\Validation\Rules\Json
 * @covers Respect\Validation\Exceptions\JsonException
 */
class JsonTest extends RuleTestCase
{
    public function providerForValidInput()
    {
        $json = new Json();

        return [
            [$json, '2'],
            [$json, '"abc"'],
            [$json, '[1,2,3]'],
            [$json, '["foo", "bar", "number", 1]'],
            [$json, '{"foo": "bar", "number":1}'],
            [$json, '[]'],
            [$json, '{}'],
            [$json, 'false'],
            [$json, 'null'],
        ];
    }

    public function providerForInvalidInput()
    {
        $json = new Json();

        return [
            [$json, false],
            [$json, new \stdClass()],
            [$json, []],
            [$json, ''],
            [$json, 'a'],
            [$json, 'xx'],
            [$json, '{foo: bar}'],
            [$json, '{foo: "baz"}'],
        ];
    }
}
