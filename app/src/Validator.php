<?php

namespace app\src;


use Symfony\Component\PropertyAccess\PropertyAccess;

class Validator
{
//    public $rule;
//
//    /**
//     * @param $name
//     * @return $this
//     */
//    public function getRule($name)
//    {
//        $a = 'app\src\Rules\\'.$name;
//        $this->rule = new $a;
//
//        return $this;
//    }
//
//    /**
//     * @param $data
//     * @return mixed
//     */
//    public function validate($data)
//    {
//        return $this->rule->validate($data);
//    }
//
    public $rules = [];

    public function __construct($rules)
    {

        foreach ($rules as $key => $rule) {
            $this->rules[$key] = $rule;
        }

    }

    public function validate($data)
    {

        $result = true;

        foreach ($data as $key => $value) {

            if ($this->rules[$key]) {
                foreach ($this->rules[$key] as $rule) {
                    $result = $rule->validate($value);
                }
            }

            if ($result == false) {
                return false;
            }
        }

        return $result;

    }

    public function errors()
    {

    }

}