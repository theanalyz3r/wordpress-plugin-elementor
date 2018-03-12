<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace phpDocumentor\Reflection;

/**
 * Interface for Api Elements
 */
interface Element
{
    /**
     * Returns the Fqsen of the element.
     *
     * @return Fqsen
     */
    public function getFqsen();

    /**
     * Returns the name of the element.
     *
     * @return string
     */
    public function getName();
}