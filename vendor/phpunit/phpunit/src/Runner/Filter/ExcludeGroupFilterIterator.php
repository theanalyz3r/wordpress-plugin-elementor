<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */
namespace PHPUnit\Runner\Filter;

class ExcludeGroupFilterIterator extends GroupFilterIterator
{
    /**
     * @param string $hash
     *
     * @return bool
     */
    protected function doAccept($hash)
    {
        return !\in_array($hash, $this->groupTests);
    }
}
