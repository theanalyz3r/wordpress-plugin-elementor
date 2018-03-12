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
 * Argument token interface.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface TokenInterface
{
    /**
     * Calculates token match score for provided argument.
     *
     * @param $argument
     *
     * @return bool|int
     */
    public function scoreArgument($argument);

    /**
     * Returns true if this token prevents check of other tokens (is last one).
     *
     * @return bool|int
     */
    public function isLast();

    /**
     * Returns string representation for token.
     *
     * @return string
     */
    public function __toString();
}
