<?php

namespace app\src;

use Symfony\Component\PropertyAccess\PropertyAccess;

class Validator
{

//Також реаізувати метод, який буде перевіряти чи це масив чи це обєкт і передавти його на етап вибору і застосування рулів
//Замість перебору масиву з даними зробит перебір по масиву з рулами
//var_dump($propertyAccessor->getValue($data, $rules['name'])); // - і до нього застосовуємо Rule
//Також відловлювати ексепшини рулів і поміщати їх в масив а потім видавати його методом - errors
//Самі ексепшини реалзувати в рулах

    public $rules = [];

    public function __construct($rules)
    {
        foreach ($rules as $key => $rule) {
            $this->rules[$key] = $rule;
        }
    }

    public function check($data)
    {
        if (gettype($data) == 'array') {
            return $this->validateArray($data);
        }

        if (gettype($data) == 'object') {
            return $this->validateObj($data);
        }
    }

    public function validateArray($data)
    {
        $result = [];
        $propertyAccessor = PropertyAccess::createPropertyAccessor();

        foreach ($this->rules as $key => $values) {

            $data1 = $propertyAccessor->getValue($data, '[' . $key . ']');

            foreach ($values as $value) {
                $result[] = $value->validate($data1);
            }
        }
        return $result;
    }

    public function validateObj($data)
    {
        $result = [];
        $propertyAccessor = PropertyAccess::createPropertyAccessor();

        foreach ($this->rules as $key => $values) {

            $data1 = $propertyAccessor->getValue($data, $key);

            foreach ($values as $value) {
                $result[] = $value->validate($data1);
            }
        }

        return $result;
    }

    public function checkResult($results)
    {
        if (count(array_unique($results)) === 1) {
            return current($results);
        } else {
            return false;
        }
    }

    public function validate($data)
    {
        $dataRules = $this->check($data);

        $result = $this->checkResult($dataRules);

        return $result;
    }

    public function errors()
    {

    }

}