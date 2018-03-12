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

class Yes extends Regex
{
    public function __construct($useLocale = false)
    {
        $pattern = '^y(eah?|ep|es)?$';
        if ($useLocale && defined('YESEXPR')) {
            $pattern = nl_langinfo(YESEXPR);
        }

        parent::__construct('/'.$pattern.'/i');
    }
}
