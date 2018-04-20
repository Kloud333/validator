<?php

namespace tests\Unit;

use app\src\Rules\AbstractRule;
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
            'name' => 'adad',
        ];

        $rules = [
            'name' => [
                new NotEmpty(),
                new StringType(),
            ]
        ];

        var_dump(is_subclass_of(new NotEmpty(), AbstractRule::class));

        $validator = new Validator($rules);

        if ($validator->validate($request)) {
            echo 'Yuhuuu';
        }
    }


}