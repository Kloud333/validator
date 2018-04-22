<?php

namespace tests\Unit;

use app\src\Rules;
use app\src\Validator;
use tests\TestData\TestObject;


class ValidatorTest extends Base
{

    /**
     * @return array
     */
    public function dataProvider()
    {

        $obj = new TestObject();
        $obj->name = 'igor';
        $obj->birth_date = '1984-08-11';
        $obj->email = 'Maksym_Odanets@epam.com';
        $obj->password = '1Az111';

        return [
            [
                [
                    'name' => 'igor',
                    'birth_date' => '1984-08-11',
                    'email' => 'Maksym_Odanets@epam.com',
                    'password' => '1Az111'
                ]
            ],
            [
                $obj
            ]
        ];
    }

    /**
     * @dataProvider dataProvider
     * @param $data
     */
    public function testArray($data)
    {
        $rules = [
            'name' => [
                new Rules\NotEmpty(),
                new Rules\StringType(),
            ],
            'birth_date' => [
                new Rules\Date('Y-m-d'),
                new Rules\Age(18)
            ],
            'email' => [
                new Rules\NotEmpty(),
                new Rules\Email(),
            ],
            'password' => [
                new Rules\NotEmpty(),
                new Rules\StringType(),
                new Rules\Password()
            ]
        ];

        $validator = new Validator($rules);

        var_dump($validator->validate($data));

        $this->assertEquals(true, $validator->validate($data));
    }

}