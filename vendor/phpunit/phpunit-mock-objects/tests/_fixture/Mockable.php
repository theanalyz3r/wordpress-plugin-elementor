<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

class Mockable
{
    public $constructorArgs;
    public $cloned;

    public function __construct($arg1 = null, $arg2 = null)
    {
        $this->constructorArgs = [$arg1, $arg2];
    }

    public function mockableMethod()
    {
        // something different from NULL
        return true;
    }

    public function anotherMockableMethod()
    {
        // something different from NULL
        return true;
    }

    public function __clone()
    {
        $this->cloned = true;
    }
}
