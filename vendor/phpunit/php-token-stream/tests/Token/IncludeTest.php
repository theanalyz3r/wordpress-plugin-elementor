<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

use PHPUnit\Framework\TestCase;

class PHP_Token_IncludeTest extends TestCase
{
    /**
     * @var PHP_Token_Stream
     */
    private $ts;

    protected function setUp()
    {
        $this->ts = new PHP_Token_Stream(TEST_FILES_PATH . 'source3.php');
    }

    /**
     * @covers PHP_Token_Includes::getName
     * @covers PHP_Token_Includes::getType
     */
    public function testGetIncludes()
    {
        $this->assertSame(
          ['test4.php', 'test3.php', 'test2.php', 'test1.php'],
          $this->ts->getIncludes()
        );
    }

    /**
     * @covers PHP_Token_Includes::getName
     * @covers PHP_Token_Includes::getType
     */
    public function testGetIncludesCategorized()
    {
        $this->assertSame(
          [
            'require_once' => ['test4.php'],
            'require'      => ['test3.php'],
            'include_once' => ['test2.php'],
            'include'      => ['test1.php']
          ],
          $this->ts->getIncludes(true)
        );
    }

    /**
     * @covers PHP_Token_Includes::getName
     * @covers PHP_Token_Includes::getType
     */
    public function testGetIncludesCategory()
    {
        $this->assertSame(
          ['test4.php'],
          $this->ts->getIncludes(true, 'require_once')
        );
    }
}
