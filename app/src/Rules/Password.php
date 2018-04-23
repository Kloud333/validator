<?php

namespace app\src\Rules;

class Password extends AbstractRule
{
    /**
     * @param $data
     * @return mixed
     */
    public function validate($data)
    {

        if (strlen($data) < '6') {
            var_dump(strlen($data));
            return "Your Password Must Contain At Least 6 Characters!";
        } elseif (!preg_match("#[0-9]+#", $data)) {
            return "Your Password Must Contain At Least 1 Number!";
        } elseif (!preg_match("#[A-Z]+#", $data)) {
            return "Your Password Must Contain At Least 1 Capital Letter!";
        } elseif (!preg_match("#[a-z]+#", $data)) {
            return "Your Password Must Contain At Least 1 Lowercase Letter!";
        }

        return true;
    }
}