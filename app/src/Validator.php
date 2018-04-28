<?php

namespace app\src;

class Validator
{
    /**
     * @var array
     */
    public $rules = [];

    /**
     * @var array
     */
    public $errors = [];

    /**
     * Validator constructor.
     * @param $rules
     * @throws \Exception
     */
    public function __construct($rules)
    {
        $this->checkRules($rules);

        $this->rules = $rules;
    }

    /**
     * @param $rules
     * @throws \Exception
     */
    public function checkRules($rules)
    {
        foreach ($rules as $key => $rule) {
            foreach ($rule as $value) {
                if (!is_subclass_of($value, 'app\src\Rules\AbstractRule')) {
                    throw new \Exception('Rule is incorrect');
                }
            }
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function validate($data)
    {
        if (gettype($data) == 'array') {
            $validator = new ArrayValidator();
        }

        if (gettype($data) == 'object') {
            $validator = new ObjectValidator();
        }

        return $this->checkResults($validator->validate($data, $this->rules));
    }

    /**
     * @param $results
     * @return bool
     */
    public function checkResults($results)
    {
        if (count($results) != 0) {
            $this->errors = $results;
            return false;
        }

        return true;
    }

    /**
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }

}