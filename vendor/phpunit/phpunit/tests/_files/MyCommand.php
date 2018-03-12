<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

use PHPUnit\TextUI\Command;

class MyCommand extends Command
{
    public function __construct()
    {
        $this->longOptions['my-option='] = 'myHandler';
        $this->longOptions['my-other-option'] = null;
    }

    public function myHandler($value)
    {
        echo __METHOD__ . " $value\n";
    }
}
