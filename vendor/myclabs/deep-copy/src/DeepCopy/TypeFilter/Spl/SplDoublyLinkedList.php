<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace DeepCopy\TypeFilter\Spl;

use DeepCopy\DeepCopy;
use DeepCopy\TypeFilter\TypeFilter;

class SplDoublyLinkedList implements TypeFilter
{
    /**
     * @var DeepCopy
     */
    private $deepCopy;

    public function __construct(DeepCopy $deepCopy)
    {
        $this->deepCopy = $deepCopy;
    }

    /**
     * {@inheritdoc}
     */
    public function apply($element)
    {
        $newElement = clone $element;

        if ($element instanceof \SplDoublyLinkedList) {
            // Replace each element in the list with a deep copy of itself
            for ($i = 1; $i <= $newElement->count(); $i++) {
                $newElement->push($this->deepCopy->copy($newElement->shift()));
            }
        }

        return $newElement;

    }
}
