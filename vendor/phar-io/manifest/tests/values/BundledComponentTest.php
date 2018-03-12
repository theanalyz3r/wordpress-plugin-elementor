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

use PharIo\Version\Version;
use PHPUnit\Framework\TestCase;

/**
 * @covers PharIo\Manifest\BundledComponent
 *
 * @uses \PharIo\Version\Version
 */
class BundledComponentTest extends TestCase {
    /**
     * @var BundledComponent
     */
    private $bundledComponent;

    protected function setUp() {
        $this->bundledComponent = new BundledComponent('phpunit/php-code-coverage', new Version('4.0.2'));
    }

    public function testCanBeCreated() {
        $this->assertInstanceOf(BundledComponent::class, $this->bundledComponent);
    }

    public function testNameCanBeRetrieved() {
        $this->assertEquals('phpunit/php-code-coverage', $this->bundledComponent->getName());
    }

    public function testVersionCanBeRetrieved() {
        $this->assertEquals('4.0.2', $this->bundledComponent->getVersion()->getVersionString());
    }
}
