<?php

namespace app\src\Rules;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

class Email extends AbstractRule
{
    /**
     * @param $data
     * @return object|boolean
     */
    public function validate($data)
    {
        $validator = new EmailValidator();
        return $validator->isValid($data, new RFCValidation()) ?: $this->createException();
    }
}