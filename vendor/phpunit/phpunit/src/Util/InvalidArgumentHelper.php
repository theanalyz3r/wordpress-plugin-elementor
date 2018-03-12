<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */
namespace PHPUnit\Util;

use PHPUnit\Framework\Exception;

/**
 * Factory for PHPUnit\Framework\Exception objects that are used to describe
 * invalid arguments passed to a function or method.
 */
class InvalidArgumentHelper
{
    /**
     * @param int    $argument
     * @param string $type
     * @param mixed  $value
     *
     * @return Exception
     */
    public static function factory($argument, $type, $value = null)
    {
        $stack = \debug_backtrace();

        return new Exception(
            \sprintf(
                'Argument #%d%sof %s::%s() must be a %s',
                $argument,
                $value !== null ? ' (' . \gettype($value) . '#' . $value . ')' : ' (No Value) ',
                $stack[1]['class'],
                $stack[1]['function'],
                $type
            )
        );
    }
}
