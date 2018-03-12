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

use PHPUnit\Framework\TestCase;

/**
 * @covers PharIo\Manifest\PhpExtensionRequirement
 */
class PhpExtensionRequirementTest extends TestCase {
    public function testCanBeCreated() {
        $this->assertInstanceOf(PhpExtensionRequirement::class, new PhpExtensionRequirement('dom'));
    }

    public function testCanBeUsedAsString() {
        $this->assertEquals('dom', new PhpExtensionRequirement('dom'));
    }
}
