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
 * @covers PharIo\Manifest\Url
 */
class UrlTest extends TestCase {
    public function testCanBeCreatedForValidUrl() {
        $this->assertInstanceOf(Url::class, new Url('https://phar.io/'));
    }

    public function testCanBeUsedAsString() {
        $this->assertEquals('https://phar.io/', new Url('https://phar.io/'));
    }

    /**
     * @covers PharIo\Manifest\InvalidUrlException
     */
    public function testCannotBeCreatedForInvalidUrl() {
        $this->expectException(InvalidUrlException::class);

        new Url('invalid');
    }
}
