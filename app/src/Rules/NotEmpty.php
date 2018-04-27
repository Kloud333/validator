<?php

namespace app\src\Rules;

class NotEmpty extends AbstractRule
{
    /**
     * @param $input
     * @return object|boolean
     */
    public function validate($input)
    {
        if (is_string($input)) {
            $input = trim($input);
        }

        return !empty($input) ?: $this->createException();
    }
}
