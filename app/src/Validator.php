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

//Також реаізувати метод, який буде перевіряти чи це масив чи це обєкт і передавти його на етап вибору і застосування рулів
//Замість перебору масиву з даними зробит перебір по масиву з рулами
//var_dump($propertyAccessor->getValue($data, $rules['name'])); // - і до нього застосовуємо Rule
//Тако відловлювати ексепшини рулів і поміщати їх в масив а потім видавати його методом - errors
//Самі ексепшини реалзувати в рулах

    public $rules = [];

    public function __construct($rules)
    {
        foreach ($rules as $key => $rule) {
            // instanseof abstract rule перевіряємо чи рул є наслідником загального класу
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