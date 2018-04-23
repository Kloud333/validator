<?php

namespace app\src\Rules;

use Egulias\EmailValidator\EmailValidator;
use Egulias\EmailValidator\Validation\RFCValidation;

class Email extends AbstractRule
{
    /**
     * @param $data
     * @return bool
     */
    public function validate($data)
    {
        $validator = new EmailValidator();
        return $validator->isValid($data, new RFCValidation());
    }
}