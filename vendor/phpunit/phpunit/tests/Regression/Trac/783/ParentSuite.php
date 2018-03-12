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

require_once 'ChildSuite.php';

class ParentSuite
{
    public static function suite()
    {
        $suite = new TestSuite('Parent');
        $suite->addTest(ChildSuite::suite());

        return $suite;
    }
}
