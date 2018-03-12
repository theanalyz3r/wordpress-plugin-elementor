<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

class TestGeneratorMaker
{
    public function create($array = [])
    {
        foreach ($array as $key => $value) {
            yield $key => $value;
        }
    }
}
