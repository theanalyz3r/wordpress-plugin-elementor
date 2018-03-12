<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

declare(strict_types=1);

namespace SebastianBergmann\Environment;

use PHPUnit\Framework\TestCase;

/**
 * @covers \SebastianBergmann\Environment\OperatingSystem
 */
final class OperatingSystemTest extends TestCase
{
    /**
     * @var \SebastianBergmann\Environment\OperatingSystem
     */
    private $os;

    protected function setUp()/*: void*/
    {
        $this->os = new OperatingSystem;
    }

    /**
     * @requires OS Linux
     */
    public function testFamilyCanBeRetrieved()/*: void*/
    {
        $this->assertEquals('Linux', $this->os->getFamily());
    }
}
