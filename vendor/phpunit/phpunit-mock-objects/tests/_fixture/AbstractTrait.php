<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

trait AbstractTrait
{
    abstract public function doSomething();

    public function mockableMethod()
    {
        return true;
    }

    public function anotherMockableMethod()
    {
        return true;
    }
}
