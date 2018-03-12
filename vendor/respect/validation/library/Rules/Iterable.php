<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

if (version_compare(PHP_VERSION, '7.1', '<')) {
    eval('namespace Respect\Validation\Rules; class Iterable extends IterableType {}');
}
