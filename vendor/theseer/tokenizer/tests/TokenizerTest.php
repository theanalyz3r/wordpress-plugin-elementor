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
 * @covers \TheSeer\Tokenizer\Tokenizer
 */
class TokenizerTest extends TestCase {

    public function testValidSourceGetsParsed() {
        $tokenizer = new Tokenizer();
        $result = $tokenizer->parse(file_get_contents(__DIR__ . '/_files/test.php'));

        $expected = unserialize(
            file_get_contents(__DIR__ . '/_files/test.php.tokens'),
            [TokenCollection::class]
        );
        $this->assertEquals($expected, $result);
    }
}
