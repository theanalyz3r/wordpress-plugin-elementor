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

class Pesel extends AbstractRule
{
    public function validate($input)
    {
        if (!preg_match('/^\d{11}$/', $input)) {
            return false;
        }

        $weights = [1, 3, 7, 9, 1, 3, 7, 9, 1, 3];

        $targetControlNumber = $input[10];
        $calculateControlNumber = 0;

        for ($i = 0; $i < 10; $i++) {
            $calculateControlNumber += $input[$i] * $weights[$i];
        }

        $calculateControlNumber = (10 - $calculateControlNumber % 10) % 10;

        return $targetControlNumber == $calculateControlNumber;
    }
}
