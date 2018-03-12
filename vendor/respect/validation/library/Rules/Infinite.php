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
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
class Infinite extends AbstractRule
{
    /**
     * {@inheritdoc}
     */
    public function validate($input)
    {
        return is_numeric($input) && is_infinite($input);
    }
}
