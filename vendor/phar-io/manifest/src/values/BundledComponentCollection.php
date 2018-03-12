<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace PharIo\Manifest;

class BundledComponentCollection implements \Countable, \IteratorAggregate {
    /**
     * @var BundledComponent[]
     */
    private $bundledComponents = [];

    public function add(BundledComponent $bundledComponent) {
        $this->bundledComponents[] = $bundledComponent;
    }

    /**
     * @return BundledComponent[]
     */
    public function getBundledComponents() {
        return $this->bundledComponents;
    }

    /**
     * @return int
     */
    public function count() {
        return count($this->bundledComponents);
    }

    /**
     * @return BundledComponentCollectionIterator
     */
    public function getIterator() {
        return new BundledComponentCollectionIterator($this);
    }
}
