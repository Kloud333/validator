<?php
namespace app\src\Rules;

class IsNumeric extends Rule
{
    /**
     * @param $input
     * @return bool
     */
    public function validate($input)
    {
        return is_numeric($input);
    }

}