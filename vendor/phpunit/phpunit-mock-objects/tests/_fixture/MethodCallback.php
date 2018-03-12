<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

class MethodCallback
{
    public static function staticCallback()
    {
        $args = func_get_args();

        if ($args == ['foo', 'bar']) {
            return 'pass';
        }
    }

    public function nonStaticCallback()
    {
        $args = func_get_args();

        if ($args == ['foo', 'bar']) {
            return 'pass';
        }
    }
}
