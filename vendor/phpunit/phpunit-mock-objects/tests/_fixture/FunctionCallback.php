<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

function functionCallback()
{
    $args = func_get_args();

    if ($args == ['foo', 'bar']) {
        return 'pass';
    }
}
