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
 * @covers Respect\Validation\Rules\Regex
 */
final class RegexTest extends RuleTestCase
{
    /**
     * {@inheritdoc}
     */
    public function providerForValidInput()
    {
        return [
            [new Regex('/^[a-z]+$/'), 'wpoiur'],
            [new Regex('/^[a-z]+$/i'), 'wPoiur'],
            [new Regex('/^[0-9]+$/i'), 42],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function providerForInvalidInput()
    {
        return [
            [new Regex('/^w+$/'), 'w poiur'],
            [new Regex('/^w+$/'), new \stdClass()],
            [new Regex('/^w+$/'), []],
        ];
    }
}
