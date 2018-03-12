<?php declare(strict_types = 1);
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace TheSeer\Tokenizer;

use PHPUnit\Framework\TestCase;

/**
 * @covers \TheSeer\Tokenizer\NamespaceUri
 */
class NamespaceUriTest extends TestCase {

    public function testCanBeConstructedWithValidNamespace() {
        $this->assertInstanceOf(
            NamespaceUri::class,
            new NamespaceUri('a:b')
        );
    }

    public function testInvalidNamespaceThrowsException() {
        $this->expectException(NamespaceUriException::class);
        new NamespaceUri('invalid-no-colon');
    }

    public function testStringRepresentationCanBeRetrieved() {
        $this->assertEquals(
            'a:b',
            (new NamespaceUri('a:b'))->asString()
        );
    }
}
