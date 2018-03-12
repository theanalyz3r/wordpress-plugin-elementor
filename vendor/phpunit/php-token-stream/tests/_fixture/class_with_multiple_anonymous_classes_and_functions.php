<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

class class_with_multiple_anonymous_classes_and_functions
{
    public function m()
    {
        $c = new class {
            public function n() {
                return true;
            }
        };

        $d = new class {
            public function o() {
                return false;
            }
        };

        $f = function ($a, $b) {
            return $a + $b;
        };

        $g = function ($a, $b) {
            return $a - $b;
        };
    }
}