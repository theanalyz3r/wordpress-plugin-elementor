<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

class StaticMockTestClass
{
    public static function doSomething()
    {
    }

    public static function doSomethingElse()
    {
        return static::doSomething();
    }
}
