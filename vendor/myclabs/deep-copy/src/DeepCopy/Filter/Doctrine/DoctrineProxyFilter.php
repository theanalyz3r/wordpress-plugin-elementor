<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace DeepCopy\Filter\Doctrine;

use DeepCopy\Filter\Filter;

/**
 * Trigger the magic method __load() on a Doctrine Proxy class to load the
 * actual entity from the database.
 */
class DoctrineProxyFilter implements Filter
{
    /**
     * {@inheritdoc}
     */
    public function apply($object, $property, $objectCopier)
    {
        $object->__load();
    }
}
