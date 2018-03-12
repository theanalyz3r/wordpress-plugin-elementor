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
 * @covers PharIo\Manifest\License
 *
 * @uses PharIo\Manifest\Url
 */
class LicenseTest extends TestCase {
    /**
     * @var License
     */
    private $license;

    protected function setUp() {
        $this->license = new License('BSD-3-Clause', new Url('https://github.com/sebastianbergmann/phpunit/blob/master/LICENSE'));
    }

    public function testCanBeCreated() {
        $this->assertInstanceOf(License::class, $this->license);
    }

    public function testNameCanBeRetrieved() {
        $this->assertEquals('BSD-3-Clause', $this->license->getName());
    }

    public function testUrlCanBeRetrieved() {
        $this->assertEquals('https://github.com/sebastianbergmann/phpunit/blob/master/LICENSE', $this->license->getUrl());
    }
}
