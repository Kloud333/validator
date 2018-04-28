<?php

namespace tests\Unit;

use app\src\ArrayValidator;
use app\src\Rules\NotEmpty;
use app\src\Rules\StringType;

class ArrayValidatorTest extends Base
{
    /**
     * @return array
     */
    public function goodArrayDataProvider()
    {
        return [
            [
                [
                    'name' => 'data',
                ]
            ],
        ];
    }

    /**
     * @return array
     */
    public function badArrayDataProvider()
    {
        return [
            [1123],
            ['string']
        ];
    }


    /**
     * @dataProvider goodArrayDataProvider
     * @param $data
     * @covers \app\src\ArrayValidator::getData()
     */
    public function testGoodArrayValidatorData($data)
    {
        $arrayValidator = new ArrayValidator();
        $this->assertEquals('data', $arrayValidator->getData($data, 'name'));
    }

    /**
     * @dataProvider badArrayDataProvider
     * @param $data
     * @covers \app\src\ArrayValidator::getData()
     * @expectedException \Exception
     */
    public function testBadArrayValidatorData($data)
    {
        $arrayValidator = new ArrayValidator();
        $arrayValidator->getData($data, 'name');
    }

    /**
     * @dataProvider goodArrayDataProvider
     * @param $data
     * @covers \app\src\ArrayValidator::validate()
     */
    public function testGoodArrayValidatorValidateData($data)
    {
        $rules = [
            'name' => [
                new NotEmpty(),
                new StringType(),
            ]
        ];

        $arrayValidator = new ArrayValidator();
        $this->assertEquals([], $arrayValidator->validate($data, $rules));
    }

    /**
     * @dataProvider badArrayDataProvider
     * @param $data
     * @covers \app\src\ArrayValidator::validate()
     * @expectedException \Exception
     */
    public function testBadArrayValidatorValidateData($data)
    {
        $rules = [
            'name' => [
                new NotEmpty(),
                new StringType(),
            ]
        ];

        $arrayValidator = new ArrayValidator();
        $this->assertEquals([], $arrayValidator->validate($data, $rules));
    }
}