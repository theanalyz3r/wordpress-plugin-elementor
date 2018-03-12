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

class ChildClass extends ParentClass
{
    private $privateInChild = 'private';
    private $protectedInChild = 'protected';
    private $publicInChild = 'public';

    public function __construct()
    {
        $this->undeclared = 'undeclared';
    }
}
