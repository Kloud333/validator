<?php

namespace tests\Unit;

use app\src\Rules\NotEmpty;
use app\src\Rules\StringType;
use app\src\Validator;


class ValidatorTest extends Base
{
//    public function testValidation()
//    {
//        $v = new Validator();
//        $a = $v->getRule('IsNumeric')->validate('aaa');
//
//        var_dump($a);
//    }

    public function testArray()
    {
        $request = [
            'name' => 123,
        ];

        $rules = [
            'name' => [
                new NotEmpty(),
                new StringType(),
            ]
        ];

//        $validator = new Validator($rules);
//
//        var_dump($validator->validate($request));
//
//        if ($validator->validate($request)) {
//            echo 'Yuhuuu';
//        }
    }


}