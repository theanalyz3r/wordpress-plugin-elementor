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

class Key extends AbstractRelated
{
    public function __construct($reference, Validatable $referenceValidator = null, $mandatory = true)
    {
        if (!is_scalar($reference) || '' === $reference) {
            throw new ComponentException('Invalid array key name');
        }
        parent::__construct($reference, $referenceValidator, $mandatory);
    }

    public function getReferenceValue($input)
    {
        return $input[$this->reference];
    }

    public function hasReference($input)
    {
        return is_array($input) && array_key_exists($this->reference, $input);
    }
}
