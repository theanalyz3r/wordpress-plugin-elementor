<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

declare(strict_types=1);

namespace SebastianBergmann\ObjectReflector\TestFixture;

class ClassWithIntegerAttributeName
{
    public function __construct()
    {
        $i        = 1;
        $this->$i = 2;
    }
}
