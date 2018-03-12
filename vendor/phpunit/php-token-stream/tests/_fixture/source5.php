<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

function foo($a, array $b, array $c = array()) {}
interface i { public function m($a, array $b, array $c = array()); }
abstract class a { abstract public function m($a, array $b, array $c = array()); }
class c { public function m($a, array $b, array $c = array()) {} }
