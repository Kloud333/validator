<?php

namespace tests\Unit;

use app\src\Validator;

class ValidatorTest extends Base
{
    public function testValidation()
    {
        $v = new Validator();
        $a = $v->getRule('IsNumeric')->validate('aaa');

        var_dump($a);
    }
}