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

class Graph extends AbstractCtypeRule
{
    protected function ctypeFunction($input)
    {
        return ctype_graph($input);
    }
}
