<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Respect\Validation\Rules;

use Respect\Validation\Exceptions\ComponentException;
use Respect\Validation\Validatable;

abstract class AbstractWrapper extends AbstractRule
{
    protected $validatable;

    public function getValidatable()
    {
        if (!$this->validatable instanceof Validatable) {
            throw new ComponentException('There is no defined validatable');
        }

        return $this->validatable;
    }

    public function assert($input)
    {
        return $this->getValidatable()->assert($input);
    }

    public function check($input)
    {
        return $this->getValidatable()->check($input);
    }

    public function validate($input)
    {
        return $this->getValidatable()->validate($input);
    }

    public function setName($name)
    {
        $this->getValidatable()->setName($name);

        return parent::setName($name);
    }
}
