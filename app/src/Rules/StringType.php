<?php

namespace app\src\Rules;

class StringType extends AbstractRule
{
    /**
     * @param $data
     * @return bool
     */
    public function validate($data)
    {
        return is_string($data);
    }
}
