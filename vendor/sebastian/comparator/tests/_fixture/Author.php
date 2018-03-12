<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace SebastianBergmann\Comparator;

/**
 * An author.
 */
class Author
{
    // the order of properties is important for testing the cycle!
    public $books = [];

    private $name = '';

    public function __construct($name)
    {
        $this->name = $name;
    }
}
