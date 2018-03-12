<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace PharIo\Manifest;

use PharIo\Version\ExactVersionConstraint;
use PHPUnit\Framework\TestCase;

/**
 * @covers PharIo\Manifest\PhpVersionRequirement
 *
 * @uses \PharIo\Version\VersionConstraint
 */
class PhpVersionRequirementTest extends TestCase {
    /**
     * @var PhpVersionRequirement
     */
    private $requirement;

    protected function setUp() {
        $this->requirement = new PhpVersionRequirement(new ExactVersionConstraint('7.1.0'));
    }

    public function testCanBeCreated() {
        $this->assertInstanceOf(PhpVersionRequirement::class, $this->requirement);
    }

    public function testVersionConstraintCanBeRetrieved() {
        $this->assertEquals('7.1.0', $this->requirement->getVersionConstraint()->asString());
    }
}
