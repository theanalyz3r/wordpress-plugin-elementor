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
 * @covers PharIo\Manifest\Application
 * @covers PharIo\Manifest\Type
 */
class ApplicationTest extends TestCase {
    /**
     * @var Application
     */
    private $type;

    protected function setUp() {
        $this->type = Type::application();
    }

    public function testCanBeCreated() {
        $this->assertInstanceOf(Application::class, $this->type);
    }

    public function testIsApplication() {
        $this->assertTrue($this->type->isApplication());
    }

    public function testIsNotLibrary() {
        $this->assertFalse($this->type->isLibrary());
    }

    public function testIsNotExtension() {
        $this->assertFalse($this->type->isExtension());
    }
}
