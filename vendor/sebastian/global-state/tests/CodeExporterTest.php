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

namespace SebastianBergmann\GlobalState;

use PHPUnit\Framework\TestCase;

/**
 * @covers \SebastianBergmann\GlobalState\CodeExporter
 */
class CodeExporterTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testCanExportGlobalVariablesToCode()
    {
        $GLOBALS = ['foo' => 'bar'];

        $snapshot = new Snapshot(null, true, false, false, false, false, false, false, false, false);

        $exporter = new CodeExporter;

        $this->assertEquals(
            '$GLOBALS = [];' . PHP_EOL . '$GLOBALS[\'foo\'] = \'bar\';' . PHP_EOL,
            $exporter->globalVariables($snapshot)
        );
    }
}
