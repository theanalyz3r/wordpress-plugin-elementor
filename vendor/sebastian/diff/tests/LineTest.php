<?php declare(strict_types=1);
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace SebastianBergmann\Diff;

use PHPUnit\Framework\TestCase;

/**
 * @covers SebastianBergmann\Diff\Line
 */
final class LineTest extends TestCase
{
    /**
     * @var Line
     */
    private $line;

    protected function setUp()
    {
        $this->line = new Line;
    }

    public function testCanBeCreatedWithoutArguments()
    {
        $this->assertInstanceOf(Line::class, $this->line);
    }

    public function testTypeCanBeRetrieved()
    {
        $this->assertSame(Line::UNCHANGED, $this->line->getType());
    }

    public function testContentCanBeRetrieved()
    {
        $this->assertSame('', $this->line->getContent());
    }
}
