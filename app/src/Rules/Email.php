<?php

namespace app\src\Rules;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

class Email extends AbstractRule
{
    /**
     * @param $input
     * @return bool
     */
    public function validate($input)
    {
        $validator = new EmailValidator();
        return $validator->isValid($input, new RFCValidation());
    }
}