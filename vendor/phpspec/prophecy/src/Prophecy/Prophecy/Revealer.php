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
 * Basic prophecies revealer.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class Revealer implements RevealerInterface
{
    /**
     * Unwraps value(s).
     *
     * @param mixed $value
     *
     * @return mixed
     */
    public function reveal($value)
    {
        if (is_array($value)) {
            return array_map(array($this, __FUNCTION__), $value);
        }

        if (!is_object($value)) {
            return $value;
        }

        if ($value instanceof ProphecyInterface) {
            $value = $value->reveal();
        }

        return $value;
    }
}
