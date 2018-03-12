<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

class WrapperIteratorAggregate implements IteratorAggregate
{
    /**
     * @var array|\Traversable
     */
    private $baseCollection;

    public function __construct($baseCollection)
    {
        assert(is_array($baseCollection) || $baseCollection instanceof Traversable);
        $this->baseCollection = $baseCollection;
    }

    public function getIterator()
    {
        foreach ($this->baseCollection as $k => $v) {
            yield $k => $v;
        }
    }
}
