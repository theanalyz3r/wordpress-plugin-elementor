<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

interface foo {
}

class class_with_method_that_declares_anonymous_class
{
    public function method()
    {
        $o = new class { public function foo() {} };
        $o = new class{public function foo(){}};
        $o = new class extends stdClass {};
        $o = new class extends stdClass {};
        $o = new class implements foo {};
    }
}
