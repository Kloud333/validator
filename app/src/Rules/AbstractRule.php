<?php

namespace app\src\Rules;

abstract class AbstractRule
{
    /**
     * @param $input
     * @return bool
     */
    public abstract function validate($input);

}