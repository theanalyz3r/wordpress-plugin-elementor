<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

use PHPUnit\Framework\TestSuite;

require_once 'OneTest.php';
require_once 'TwoTest.php';

class ChildSuite
{
    public static function suite()
    {
        $suite = new TestSuite('Child');
        $suite->addTestSuite(OneTest::class);
        $suite->addTestSuite(TwoTest::class);

        return $suite;
    }
}
