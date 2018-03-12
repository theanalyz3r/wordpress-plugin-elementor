<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Doctrine\Instantiator;

/**
 * Instantiator provides utility methods to build objects without invoking their constructors
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 */
interface InstantiatorInterface
{
    /**
     * @param string $className
     *
     * @return object
     *
     * @throws \Doctrine\Instantiator\Exception\ExceptionInterface
     */
    public function instantiate($className);
}
