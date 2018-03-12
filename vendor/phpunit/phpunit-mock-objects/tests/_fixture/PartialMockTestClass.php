<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

class PartialMockTestClass
{
    public $constructorCalled = false;

    public function __construct()
    {
        $this->constructorCalled = true;
    }

    public function doSomething()
    {
    }

    public function doAnotherThing()
    {
    }
}
