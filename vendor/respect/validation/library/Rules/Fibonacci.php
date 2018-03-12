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
 * @author Samuel Heinzmann <samuel.heinzman@swisscom.com>
 */
class Fibonacci extends AbstractRule
{
    /**
     * {@inheritdoc}
     */
    public function validate($input)
    {
        if (!is_numeric($input)) {
            return false;
        }

        $sequence = [0, 1];
        $position = 1;
        while ($input > $sequence[$position]) {
            ++$position;
            $sequence[$position] = $sequence[$position - 1] + $sequence[$position - 2];
        }

        return $sequence[$position] === (int) $input;
    }
}
