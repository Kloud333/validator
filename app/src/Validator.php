<?php

namespace app\src;


use Symfony\Component\PropertyAccess\PropertyAccess;

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

    public $rules = [];


//    public function __construct($rules)
//    {
//        var_dump($rules['name']);
//
//        foreach ($rules as $key => $rule) {
//            $arr = $this->rules[] = $rule;
//        }
//
//
//
//    }
//
//    public function validate($data)
//    {
//        $propertyAccessor = PropertyAccess::createPropertyAccessor();
//
//        $result = true;
//
//        foreach ($data as $key => $value) {
//
//            if ($this->rules[$key]) {
//
//                $result = $this->rules[$key]->validate($value);
//            }
//
//            if ($result == false) {
//                return false;
//            }
//        }
//
//        return $result;
//
//    }
//
//    public function errors()
//    {
//
//    }


}