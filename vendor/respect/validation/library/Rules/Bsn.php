<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Respect\Validation\Rules;

/**
 * Validates a Dutch citizen service number (BSN).
 *
 * @author Ronald Drenth <ronalddrenth@gmail.com>
 *
 * @see https://nl.wikipedia.org/wiki/Burgerservicenummer
 */
class Bsn extends AbstractRule
{
    /**
     * {@inheritdoc}
     */
    public function validate($input)
    {
        if (!ctype_digit($input)) {
            return false;
        }

        if (strlen($input) !== 9) {
            return false;
        }

        $sum = -1 * $input[8];
        for ($i = 9; $i > 1; --$i) {
            $sum += $i * $input[9 - $i];
        }

        return $sum !== 0 && $sum % 11 === 0;
    }
}
