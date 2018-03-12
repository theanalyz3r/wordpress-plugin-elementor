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
 * @covers PharIo\Manifest\CopyrightInformation
 *
 * @uses PharIo\Manifest\AuthorCollection
 * @uses PharIo\Manifest\AuthorCollectionIterator
 * @uses PharIo\Manifest\Author
 * @uses PharIo\Manifest\Email
 * @uses PharIo\Manifest\License
 * @uses PharIo\Manifest\Url
 */
class CopyrightInformationTest extends TestCase {
    /**
     * @var CopyrightInformation
     */
    private $copyrightInformation;

    /**
     * @var Author
     */
    private $author;

    /**
     * @var License
     */
    private $license;

    protected function setUp() {
        $this->author  = new Author('Joe Developer', new Email('user@example.com'));
        $this->license = new License('BSD-3-Clause', new Url('https://github.com/sebastianbergmann/phpunit/blob/master/LICENSE'));

        $authors = new AuthorCollection;
        $authors->add($this->author);

        $this->copyrightInformation = new CopyrightInformation($authors, $this->license);
    }

    public function testCanBeCreated() {
        $this->assertInstanceOf(CopyrightInformation::class, $this->copyrightInformation);
    }

    public function testAuthorsCanBeRetrieved() {
        $this->assertContains($this->author, $this->copyrightInformation->getAuthors());
    }

    public function testLicenseCanBeRetrieved() {
        $this->assertEquals($this->license, $this->copyrightInformation->getLicense());
    }
}
