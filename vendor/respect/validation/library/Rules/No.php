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

class No extends Regex
{
    public function __construct($useLocale = false)
    {
        $pattern = '^n(o(t|pe)?|ix|ay)?$';
        if ($useLocale && defined('NOEXPR')) {
            $pattern = nl_langinfo(NOEXPR);
        }

        parent::__construct('/'.$pattern.'/i');
    }
}
