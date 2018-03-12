<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

abstract class AbstractMockTestClass implements MockTestInterface
{
    abstract public function doSomething();

    public function returnAnything()
    {
        return 1;
    }
}
