<?php

namespace app\src\Rules;

class StringType extends AbstractRule
{

    /**
     * @param $data
     * @return object|boolean
     */
    public function validate($data)
    {
        return is_string($data) ?: $this->createException();
    }
}
