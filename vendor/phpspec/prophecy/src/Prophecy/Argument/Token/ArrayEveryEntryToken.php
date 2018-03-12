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
 * Array every entry token.
 *
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class ArrayEveryEntryToken implements TokenInterface
{
    /**
     * @var TokenInterface
     */
    private $value;

    /**
     * @param mixed $value exact value or token
     */
    public function __construct($value)
    {
        if (!$value instanceof TokenInterface) {
            $value = new ExactValueToken($value);
        }

        $this->value = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function scoreArgument($argument)
    {
        if (!$argument instanceof \Traversable && !is_array($argument)) {
            return false;
        }

        $scores = array();
        foreach ($argument as $key => $argumentEntry) {
            $scores[] = $this->value->scoreArgument($argumentEntry);
        }

        if (empty($scores) || in_array(false, $scores, true)) {
            return false;
        }

        return array_sum($scores) / count($scores);
    }

    /**
     * {@inheritdoc}
     */
    public function isLast()
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return sprintf('[%s, ..., %s]', $this->value, $this->value);
    }

    /**
     * @return TokenInterface
     */
    public function getValue()
    {
        return $this->value;
    }
}
