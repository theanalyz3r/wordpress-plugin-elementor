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

class DependencyTestSuite
{
    public static function suite()
    {
        $suite = new TestSuite('Test Dependencies');

        $suite->addTestSuite(DependencySuccessTest::class);
        $suite->addTestSuite(DependencyFailureTest::class);

        return $suite;
    }
}
