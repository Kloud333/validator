<?php

namespace app\src\Rules;

class StringType extends AbstractRule
{
    /**
     * @param $input
     * @return bool
     */
    public function validate($input)
    {
        return is_string($input);
    }
}
