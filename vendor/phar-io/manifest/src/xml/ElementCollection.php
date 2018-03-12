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

use DOMElement;
use DOMNodeList;

abstract class ElementCollection implements \Iterator {
    /**
     * @var DOMNodeList
     */
    private $nodeList;

    private $position;

    /**
     * ElementCollection constructor.
     *
     * @param DOMNodeList $nodeList
     */
    public function __construct(DOMNodeList $nodeList) {
        $this->nodeList = $nodeList;
        $this->position = 0;
    }

    abstract public function current();

    /**
     * @return DOMElement
     */
    protected function getCurrentElement() {
        return $this->nodeList->item($this->position);
    }

    public function next() {
        $this->position++;
    }

    public function key() {
        return $this->position;
    }

    public function valid() {
        return $this->position < $this->nodeList->length;
    }

    public function rewind() {
        $this->position = 0;
    }
}
