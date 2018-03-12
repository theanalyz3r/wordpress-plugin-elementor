<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

use PHPUnit\Framework\BaseTestListener;
use PHPUnit\Framework\Test;

class BaseTestListenerSample extends BaseTestListener
{
    public $endCount = 0;

    public function endTest(Test $test, $time)
    {
        $this->endCount++;
    }
}
