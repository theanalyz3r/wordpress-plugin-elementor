<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */
namespace PHPUnit\Framework\Constraint;

class SameSize extends Count
{
    /**
     * @var int
     */
    protected $expectedCount;

    /**
     * @param \Countable|\Traversable|array $expected
     */
    public function __construct($expected)
    {
        parent::__construct($this->getCountOf($expected));
    }
}
