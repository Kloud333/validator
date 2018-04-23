<?php

namespace app\src;

abstract class Validation
{
    /**
     * @param $rules
     * @return mixed
     */
    public function getRules($rules)
    {
        foreach ($rules as $key => $rule) {
            $rules[$key] = $rule;
        }

        return $rules;
    }

    /**
     * @param $data
     * @param $rues
     * @return array
     */
    public abstract function validation($data, $rues);

    /**
     * @param $data
     * @param $rules
     * @return array
     */
    public function validate($data, $rules)
    {
        $dataRules = $this->getRules($rules);

        $validData = $this->validation($data, $dataRules);

        return $validData;
    }


}