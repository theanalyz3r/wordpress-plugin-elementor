<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Prophecy\Argument\Token;

/**
 * String contains token.
 *
 * @author Peter Mitchell <pete@peterjmit.com>
 */
class StringContainsToken implements TokenInterface
{
    private $value;

    /**
     * Initializes token.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function scoreArgument($argument)
    {
        return strpos($argument, $this->value) !== false ? 6 : false;
    }

    /**
     * Returns preset value against which token checks arguments.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Returns false.
     *
     * @return bool
     */
    public function isLast()
    {
        return false;
    }

    /**
     * Returns string representation for token.
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf('contains("%s")', $this->value);
    }
}
