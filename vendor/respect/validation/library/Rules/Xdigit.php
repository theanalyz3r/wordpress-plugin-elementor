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

class Xdigit extends AbstractCtypeRule
{
    public function ctypeFunction($input)
    {
        return ctype_xdigit($input);
    }
}
