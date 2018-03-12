<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace SebastianBergmann\CodeCoverage\Report\Xml;

class Tests
{
    private $contextNode;

    private $codeMap = [
        0 => 'PASSED',     // PHPUnit_Runner_BaseTestRunner::STATUS_PASSED
        1 => 'SKIPPED',    // PHPUnit_Runner_BaseTestRunner::STATUS_SKIPPED
        2 => 'INCOMPLETE', // PHPUnit_Runner_BaseTestRunner::STATUS_INCOMPLETE
        3 => 'FAILURE',    // PHPUnit_Runner_BaseTestRunner::STATUS_FAILURE
        4 => 'ERROR',      // PHPUnit_Runner_BaseTestRunner::STATUS_ERROR
        5 => 'RISKY',      // PHPUnit_Runner_BaseTestRunner::STATUS_RISKY
        6 => 'WARNING'     // PHPUnit_Runner_BaseTestRunner::STATUS_WARNING
    ];

    public function __construct(\DOMElement $context)
    {
        $this->contextNode = $context;
    }

    public function addTest($test, array $result)
    {
        $node = $this->contextNode->appendChild(
            $this->contextNode->ownerDocument->createElementNS(
                'http://schema.phpunit.de/coverage/1.0',
                'test'
            )
        );

        $node->setAttribute('name', $test);
        $node->setAttribute('size', $result['size']);
        $node->setAttribute('result', (int) $result['status']);
        $node->setAttribute('status', $this->codeMap[(int) $result['status']]);
    }
}
