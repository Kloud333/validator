<?php
namespace app\src\Rules;

abstract class AbstractRule
{
    /**
     * @param $input
     * @return mixed
     */
    public abstract function validate($input);

}