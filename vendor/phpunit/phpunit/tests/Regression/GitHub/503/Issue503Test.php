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

class Issue503Test extends TestCase
{
    public function testCompareDifferentLineEndings()
    {
        $this->assertSame(
            "foo\n",
            "foo\r\n"
        );
    }
}
