<?php

namespace app\src;

class Validator
{

    public $rules = [];

    public $errors = [];

    /**
     * Validator constructor.
     * @param $rules
     */
    public function __construct($rules)
    {
        $this->rules = $rules;
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

        return $this->check($validator->validate($data, $this->rules));

    }

    /**
     * @param $results
     * @return bool
     */
    public function check($results)
    {
        $data = 0;

        foreach ($results as $result) {
            if (is_object($result)) {
                $this->errors = $result;
                $data += 1;
            }
        }

        if ($data != 0) {
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