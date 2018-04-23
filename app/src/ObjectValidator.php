<?php

namespace app\src;

use Symfony\Component\PropertyAccess\PropertyAccess;

class ObjectValidator extends Validation
{
    /**
     * @param $allData
     * @param $allRules
     * @return array
     */
    public function validation($allData, $allRules)
    {
        $propertyAccessor = PropertyAccess::createPropertyAccessor();

        foreach ($allRules as $key => $rules) {

            $data = $propertyAccessor->getValue($allData, $key);

            foreach ($rules as $rule) {
                $result[] = $rule->validation($data);
            }
        }

        return $result;
    }

}