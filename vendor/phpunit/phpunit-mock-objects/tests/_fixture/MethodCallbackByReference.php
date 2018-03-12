<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

class MethodCallbackByReference
{
    public function bar(&$a, &$b, $c)
    {
        Legacy::bar($a, $b, $c);
    }

    public function callback(&$a, &$b, $c)
    {
        $b = 1;
    }
}
