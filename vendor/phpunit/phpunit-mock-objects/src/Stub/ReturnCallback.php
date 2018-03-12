<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

class PHPUnit_Framework_MockObject_Stub_ReturnCallback implements PHPUnit_Framework_MockObject_Stub
{
    protected $callback;

    public function __construct($callback)
    {
        $this->callback = $callback;
    }

    public function invoke(PHPUnit_Framework_MockObject_Invocation $invocation)
    {
        return call_user_func_array($this->callback, $invocation->parameters);
    }

    public function toString()
    {
        if (is_array($this->callback)) {
            if (is_object($this->callback[0])) {
                $class = get_class($this->callback[0]);
                $type  = '->';
            } else {
                $class = $this->callback[0];
                $type  = '::';
            }

            return sprintf(
                'return result of user defined callback %s%s%s() with the ' .
                'passed arguments',
                $class,
                $type,
                $this->callback[1]
            );
        } else {
            return 'return result of user defined callback ' . $this->callback .
                   ' with the passed arguments';
        }
    }
}
