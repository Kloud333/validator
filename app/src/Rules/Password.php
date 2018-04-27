<?php

namespace app\src\Rules;

class Password extends AbstractRule
{
    /**
     * @param $data
     * @return object|boolean
     */
    public function validate($data)
    {
        if (strlen($data) < '6') {
            return $this->createException("Your Password Must Contain At Least 6 Characters!");
        }
        if (!preg_match("#[0-9]+#", $data)) {
            return $this->createException("Your Password Must Contain At Least 1 Number!");
        }

        if (!preg_match("#[A-Z]+#", $data)) {
            return $this->createException("Your Password Must Contain At Least 1 Capital Letter!");
        }

        if (!preg_match("#[a-z]+#", $data)) {
            return $this->createException("Your Password Must Contain At Least 1 Lowercase Letter!");
        }

        return true;
    }
}