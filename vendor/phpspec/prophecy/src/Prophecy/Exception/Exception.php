<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Prophecy\Exception;

/**
 * Core Prophecy exception interface.
 * All Prophecy exceptions implement it.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface Exception
{
    /**
     * @return string
     */
    public function getMessage();
}
