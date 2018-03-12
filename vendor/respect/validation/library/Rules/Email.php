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

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

class Email extends AbstractRule
{
    public function __construct(EmailValidator $emailValidator = null)
    {
        $this->emailValidator = $emailValidator;
    }

    public function getEmailValidator()
    {
        if (!$this->emailValidator instanceof EmailValidator
            && class_exists('Egulias\\EmailValidator\\EmailValidator')) {
            $this->emailValidator = new EmailValidator();
        }

        return $this->emailValidator;
    }

    public function validate($input)
    {
        $emailValidator = $this->getEmailValidator();
        if (!$emailValidator instanceof EmailValidator) {
            return is_string($input) && filter_var($input, FILTER_VALIDATE_EMAIL);
        }

        if (!class_exists('Egulias\\EmailValidator\\Validation\\RFCValidation')) {
            return $emailValidator->isValid($input);
        }

        return $emailValidator->isValid($input, new RFCValidation());
    }
}
