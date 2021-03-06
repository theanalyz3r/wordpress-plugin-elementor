<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Respect\Validation\Rules\Locale;

use malkusch\bav\BAV;
use Respect\Validation\Rules\AbstractRule;

/**
 * Validates a german bank.
 *
 * This validator depends on the composer package "malkusch/bav".
 *
 * @author Markus Malkusch <markus@malkusch.de>
 *
 * @see    BAV::isValidBank()
 */
class GermanBank extends AbstractRule
{
    /**
     * @var BAV
     */
    public $bav;

    /**
     * @param BAV $bav
     */
    public function __construct(BAV $bav = null)
    {
        if (null === $bav) {
            $bav = new BAV();
        }
        $this->bav = $bav;
    }

    /**
     * @return bool
     */
    public function validate($input)
    {
        return $this->bav->isValidBank($input);
    }
}
