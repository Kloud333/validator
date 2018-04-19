<?php
namespace app\src\Rules;

abstract class Rule
{
    /**
     * @param $input
     * @return mixed
     */
    public abstract function validate($input);

}