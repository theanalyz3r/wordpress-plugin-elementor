<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

$function1 = function($foo, $bar) use ($var) {};
$function2 = function(Foo $foo, $bar) use ($var) {};
$function3 = function ($foo, $bar, $baz) {};
$function4 = function (Foo $foo, $bar, $baz) {};
$function5 = function () {};
$function6 = function() {};
