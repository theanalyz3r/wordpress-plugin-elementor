<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace DeepCopy\TypeFilter;

interface TypeFilter
{
    /**
     * Apply the filter to the object.
     * @param mixed $element
     */
    public function apply($element);
}
