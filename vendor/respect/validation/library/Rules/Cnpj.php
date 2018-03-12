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

class Cnpj extends AbstractRule
{
    public function validate($input)
    {
        if (!is_scalar($input)) {
            return false;
        }

        // Code ported from jsfromhell.com
        $cleanInput = preg_replace('/\D/', '', $input);
        $b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        if ($cleanInput < 1) {
            return false;
        }

        if (mb_strlen($cleanInput) != 14) {
            return false;
        }

        for ($i = 0, $n = 0; $i < 12; $n += $cleanInput[$i] * $b[++$i]);

        if ($cleanInput[12] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        for ($i = 0, $n = 0; $i <= 12; $n += $cleanInput[$i] * $b[$i++]);

        if ($cleanInput[13] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        return true;
    }
}
