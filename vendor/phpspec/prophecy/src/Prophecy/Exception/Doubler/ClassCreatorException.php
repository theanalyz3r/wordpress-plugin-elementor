<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Prophecy\Exception\Doubler;

use Prophecy\Doubler\Generator\Node\ClassNode;

class ClassCreatorException extends \RuntimeException implements DoublerException
{
    private $node;

    public function __construct($message, ClassNode $node)
    {
        parent::__construct($message);

        $this->node = $node;
    }

    public function getClassNode()
    {
        return $this->node;
    }
}
