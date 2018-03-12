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
 * @covers PharIo\Manifest\Author
 *
 * @uses PharIo\Manifest\Email
 */
class AuthorTest extends TestCase {
    /**
     * @var Author
     */
    private $author;

    protected function setUp() {
        $this->author = new Author('Joe Developer', new Email('user@example.com'));
    }

    public function testCanBeCreated() {
        $this->assertInstanceOf(Author::class, $this->author);
    }

    public function testNameCanBeRetrieved() {
        $this->assertEquals('Joe Developer', $this->author->getName());
    }

    public function testEmailCanBeRetrieved() {
        $this->assertEquals('user@example.com', $this->author->getEmail());
    }

    public function testCanBeUsedAsString() {
        $this->assertEquals('Joe Developer <user@example.com>', $this->author);
    }
}
