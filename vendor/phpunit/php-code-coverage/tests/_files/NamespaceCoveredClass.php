<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Foo;

class CoveredParentClass
{
    private function privateMethod()
    {
    }

    protected function protectedMethod()
    {
        $this->privateMethod();
    }

    public function publicMethod()
    {
        $this->protectedMethod();
    }
}

class CoveredClass extends CoveredParentClass
{
    private function privateMethod()
    {
    }

    protected function protectedMethod()
    {
        parent::protectedMethod();
        $this->privateMethod();
    }

    public function publicMethod()
    {
        parent::publicMethod();
        $this->protectedMethod();
    }
}
