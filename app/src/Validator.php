<?php

namespace app\src;


class Validator
{
    public $rule;

    /**
     * @param $name
     * @return $this
     */
    public function getRule($name)
    {
        $a = 'app\src\Rules\\'.$name;
        $this->rule = new $a;

        return $this;

    }

    /**
     * @param $data
     * @return mixed
     */
    public function validate($data)
    {
        return $this->rule->validate($data);
    }
}