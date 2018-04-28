<?php

namespace tests\Unit;

use app\src\Rules;
use app\src\Validator;
use stdClass;
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
                    'password' => '11'
                ]
            ],
            [
                $obj
            ]
        ];
    }

    /**
     * @return array
     */
    public function badCheckRulesProvider()
    {
        return [
            [
                [
                    'name' => [
                        new stdClass()
                    ]
                ]
            ],
        ];
    }

    /**
     * @return array
     */
    public function goodCheckResultsProvider()
    {
        return [
            [
                []
            ],
        ];
    }

    /**
     * @return array
     */
    public function badCheckResultsProvider()
    {
        return [
            [
                [
                    'test_data'
                ]
            ],
        ];
    }

    /**
     * @dataProvider goodDataProvider
     * @param $data
     * @covers \app\src\Validator::validate()
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
     * @covers \app\src\Validator::validate()
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

    /**
     * @dataProvider badCheckRulesProvider
     * @param $data
     * @covers \app\src\Validator::checkRules()
     * @expectedException \Exception
     */
    public function testBadCheckRules($data)
    {
        $validator = new Validator($rules = []);
        $validator->checkRules($data);
    }

    /**
     * @dataProvider goodCheckResultsProvider
     * @param $data
     */
    public function testGoodCheckResults($data)
    {
        $validator = new Validator($rules = []);
        $this->assertEquals(true, $validator->checkResults($data));
    }

    /**
     * @dataProvider badCheckResultsProvider
     * @param $data
     */
    public function testBadCheckResults($data)
    {
        $validator = new Validator($rules = []);
        $this->assertEquals(false, $validator->checkResults($data));
    }

    /**
     * @dataProvider goodCheckResultsProvider
     * @param $data
     */
    public function testGoodCheckErrors($data)
    {
        $validator = new Validator($rules = []);
        $validator->checkResults($data);
        $this->assertEquals([], $validator->errors());
    }

    /**
     * @dataProvider badCheckResultsProvider
     * @param $data
     */
    public function testBadCheckErrors($data)
    {
        $validator = new Validator($rules = []);
        $validator->checkResults($data);
        $this->assertEquals(['test_data'], $validator->errors());
    }
}