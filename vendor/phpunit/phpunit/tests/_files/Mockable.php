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
    public $constructorCalled = false;
    public $cloned            = false;

    public function __construct()
    {
        $this->constructorCalled = false;
    }

    public function foo()
    {
        return true;
    }

    public function bar()
    {
        return true;
    }

    public function __clone()
    {
        $this->cloned = true;
    }
}
