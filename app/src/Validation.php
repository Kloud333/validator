<?php

namespace app\src;

abstract class Validation
{
    /**
     * @param $allData
     * @param $key
     * @return array
     */
    public abstract function getData($allData, $key);

    /**
     * @param $allData
     * @param $allRules
     * @return array
     */
    public function validateData($allData, $allRules)
    {
        foreach ($allRules as $key => $rules) {

            $data = $this->getData($allData, $key);

            foreach ($rules as $rule) {
                $result[] = $rule->validate($data);
            }
        }

        return $result;
    }

    public function checkValidationData($enterData)
    {
        $result = [];

        foreach ($enterData as $data) {
            if (is_object($data)) {
                $result[] = $data->errorMessage;
            }
        }

        return $result;
    }


    /**
     * @param $data
     * @param $rules
     * @return array
     */
    public function validate($data, $rules)
    {
        $validData = $this->validateData($data, $rules);

        $finalData = $this->checkValidationData($validData);

        return $finalData;
    }

}