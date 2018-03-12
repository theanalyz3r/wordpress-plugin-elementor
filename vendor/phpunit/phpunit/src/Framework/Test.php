<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace PHPUnit\Framework;

use Countable;

/**
 * A Test can be run and collect its results.
 */
interface Test extends Countable
{
    /**
     * Runs a test and collects its result in a TestResult instance.
     *
     * @param TestResult $result
     *
     * @return TestResult
     */
    public function run(TestResult $result = null);
}
