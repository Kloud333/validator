<?php

namespace app\src;

use Symfony\Component\PropertyAccess\PropertyAccess;

class ArrayValidator extends Validation
{
    /**
     * @param $allData
     * @param $key
     * @return array
     */
    public function getData($allData, $key){
        $propertyAccessor = PropertyAccess::createPropertyAccessor();
        return $propertyAccessor->getValue($allData, '[' . $key . ']');
    }
}