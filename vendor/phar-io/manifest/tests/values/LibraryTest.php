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
 * @covers PharIo\Manifest\Library
 * @covers PharIo\Manifest\Type
 */
class LibraryTest extends TestCase {
    /**
     * @var Library
     */
    private $type;

    protected function setUp() {
        $this->type = Type::library();
    }

    public function testCanBeCreated() {
        $this->assertInstanceOf(Library::class, $this->type);
    }

    public function testIsNotApplication() {
        $this->assertFalse($this->type->isApplication());
    }

    public function testIsLibrary() {
        $this->assertTrue($this->type->isLibrary());
    }

    public function testIsNotExtension() {
        $this->assertFalse($this->type->isExtension());
    }
}
