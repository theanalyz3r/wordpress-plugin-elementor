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

class AtLeastException extends GroupedValidationException
{
    public static $defaultTemplates = [
        self::MODE_DEFAULT => [
            self::NONE => 'At least {{howMany}} of the {{failed}} required rules must pass for {{name}}',
            self::SOME => 'At least {{howMany}} of the {{failed}} required rules must pass for {{name}}, only {{passed}} passed.',
        ],
        self::MODE_NEGATIVE => [
            self::NONE => 'At least {{howMany}} of the {{failed}} required rules must not pass for {{name}}',
            self::SOME => 'At least {{howMany}} of the {{failed}} required rules must not pass for {{name}}, only {{passed}} passed.',
        ],
    ];
}
