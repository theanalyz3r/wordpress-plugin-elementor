<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Prophecy\Prophecy;

/**
 * Prophecies revealer interface.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface RevealerInterface
{
    /**
     * Unwraps value(s).
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function reveal($value);
}
