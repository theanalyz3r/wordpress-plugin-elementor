<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace PharIo\Version;

use PHPUnit\Framework\TestCase;

/**
 * @covers PharIo\Version\SpecificMajorVersionConstraint
 */
class SpecificMajorVersionConstraintTest extends TestCase {
    public function versionProvider() {
        return [
            // compliant versions
            [1, new Version('1.0.2'), true],
            [1, new Version('1.0.3'), true],
            [1, new Version('1.1.1'), true],
            // non-compliant versions
            [2, new Version('0.9.9'), false],
            [3, new Version('2.2.3'), false],
            [3, new Version('2.9.9'), false],
        ];
    }

    /**
     * @dataProvider versionProvider
     *
     * @param int     $major
     * @param Version $version
     * @param bool    $expectedResult
     */
    public function testReturnsTrueForCompliantVersions($major, Version $version, $expectedResult) {
        $constraint = new SpecificMajorVersionConstraint('foo', $major);

        $this->assertSame($expectedResult, $constraint->complies($version));
    }
}
