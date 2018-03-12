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

class Instance extends AbstractRule
{
    public $instanceName;

    public function __construct($instanceName)
    {
        $this->instanceName = $instanceName;
    }

    public function reportError($input, array $extraParams = [])
    {
        return parent::reportError($input, $extraParams);
    }

    public function validate($input)
    {
        return $input instanceof $this->instanceName;
    }
}
