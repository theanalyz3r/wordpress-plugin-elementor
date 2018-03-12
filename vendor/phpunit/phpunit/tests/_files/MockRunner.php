<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

use PHPUnit\Runner\BaseTestRunner;

class MockRunner extends BaseTestRunner
{
    protected function runFailed($message)
    {
    }
}
