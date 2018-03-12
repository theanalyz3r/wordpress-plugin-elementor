<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

class Test {
	public function methodOne() {
		$foo = new class {
			public function method_in_anonymous_class() {
				return true;
			}
		};

		return $foo->method_in_anonymous_class();
	}

	public function methodTwo() {
		return false;
	}
}
