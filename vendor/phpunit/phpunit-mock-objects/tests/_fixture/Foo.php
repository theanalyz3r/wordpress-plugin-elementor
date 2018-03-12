<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

class Foo
{
    public function doSomething(Bar $bar)
    {
        return $bar->doSomethingElse();
    }
}
