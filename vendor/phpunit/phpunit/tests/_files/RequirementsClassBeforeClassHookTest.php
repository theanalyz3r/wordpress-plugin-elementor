<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

use PHPUnit\Framework\TestCase;

/**
 * @requires extension nonExistingExtension
 */
class RequirementsClassBeforeClassHookTest extends TestCase
{
    public static function setUpBeforeClass()
    {
        throw new Exception(__METHOD__ . ' should not be called because of class requirements.');
    }
}
