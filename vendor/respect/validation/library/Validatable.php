<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Respect\Validation;

/** Interface for validation rules */
interface Validatable
{
    public function assert($input);

    public function check($input);

    public function getName();

    public function reportError($input, array $relatedExceptions = []);

    public function setName($name);

    public function setTemplate($template);

    public function validate($input);
}
