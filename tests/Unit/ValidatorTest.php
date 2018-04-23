<?php

namespace tests\Unit;

use app\src\Rules;
use app\src\Validator;
use tests\TestData\TestObject;


class ValidatorTest extends Base
{

    /**
     * @return array|object
     */
    public function goodDataProvider()
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
     * @return array|object
     */
    public function badDataProvider()
    {

        $obj = new TestObject();
        $obj->name = '';
        $obj->birth_date = '1984-08-11';
        $obj->email = 'Maksym_Odanets@epam.com';
        $obj->password = '1Az111';

        return [
            [
                [
                    'name' => '',
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
     * @dataProvider goodDataProvider
     * @param $data
     * @throws \Exception
     */
    public function testGoodInputData($data)
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

        $this->assertEquals(true, $validator->validate($data));
    }

    /**
     * @dataProvider badDataProvider
     * @param $data
     * @throws \Exception
     */
    public function testBadInputData($data)
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

        $this->assertEquals(false, $validator->validate($data));
    }

}