<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

if (extension_loaded('xdebug')) {
    xdebug_disable();
}

    throw new Exception(
        'PHPUnit suppresses exceptions thrown outside of test case function'
    );
