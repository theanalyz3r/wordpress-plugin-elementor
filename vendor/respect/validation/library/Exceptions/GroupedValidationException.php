<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Respect\Validation\Exceptions;

class GroupedValidationException extends NestedValidationException
{
    const NONE = 0;
    const SOME = 1;

    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::NONE => 'All of the required rules must pass for {{name}}',
            self::SOME => 'These rules must pass for {{name}}',
        ],
        self::MODE_NEGATIVE => [
            self::NONE => 'None of there rules must pass for {{name}}',
            self::SOME => 'These rules must not pass for {{name}}',
        ],
    ];

    public function chooseTemplate()
    {
        $numRules = $this->getParam('passed');
        $numFailed = $this->getRelated()->count();

        return $numRules === $numFailed ? static::NONE : static::SOME;
    }
}
