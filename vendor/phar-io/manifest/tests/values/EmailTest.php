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
 * @covers PharIo\Manifest\Email
 */
class EmailTest extends TestCase {
    public function testCanBeCreatedForValidEmail() {
        $this->assertInstanceOf(Email::class, new Email('user@example.com'));
    }

    public function testCanBeUsedAsString() {
        $this->assertEquals('user@example.com', new Email('user@example.com'));
    }

    /**
     * @covers PharIo\Manifest\InvalidEmailException
     */
    public function testCannotBeCreatedForInvalidEmail() {
        $this->expectException(InvalidEmailException::class);

        new Email('invalid');
    }
}
