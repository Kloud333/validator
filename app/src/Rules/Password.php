<?php

namespace app\src\Rules;


class Password extends AbstractRule
{
    /**
     * @param $input
     * @return mixed
     */
    public function validate($input)
    {

        if (strlen($input) < '6') {
            var_dump(strlen($input));
            return "Your Password Must Contain At Least 6 Characters!";
        } elseif (!preg_match("#[0-9]+#", $input)) {
            return "Your Password Must Contain At Least 1 Number!";
        } elseif (!preg_match("#[A-Z]+#", $input)) {
            return "Your Password Must Contain At Least 1 Capital Letter!";
        } elseif (!preg_match("#[a-z]+#", $input)) {
            return "Your Password Must Contain At Least 1 Lowercase Letter!";
        }

        return true;

    }
}