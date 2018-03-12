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

class TokenTest extends TestCase {

    /** @var  Token */
    private $token;

    protected function setUp() {
        $this->token = new Token(1,'test-dummy', 'blank');
    }

    public function testTokenCanBeCreated() {
        $this->assertInstanceOf(Token::class, $this->token);
    }

    public function testTokenLineCanBeRetrieved() {
        $this->assertEquals(1, $this->token->getLine());
    }

    public function testTokenNameCanBeRetrieved() {
        $this->assertEquals('test-dummy', $this->token->getName());
    }

    public function testTokenValueCanBeRetrieved() {
        $this->assertEquals('blank', $this->token->getValue());
    }

}
