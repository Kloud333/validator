<?php

namespace tests\Unit;

use app\src\ArrayValidator;
use app\src\ObjectValidator;
use app\src\Rules\NotEmpty;
use app\src\Rules\StringType;
use stdClass;

class ObjextAndArrayValidatorsTest extends Base
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
    public function goodObjectDataProvider()
    {
        $object = new StdClass();
        $object->name = 'data';

        return [
            [$object],
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
     * @return array
     */
    public function badObjectDataProvider()
    {
        $object = new StdClass();

        return [
            [$object],
        ];
    }

    /**
     * @dataProvider goodArrayDataProvider
     * @param $data
     */
    public function testGoodArrayValidatorData($data)
    {
        $arrayValidator = new ArrayValidator();
        $this->assertEquals('data', $arrayValidator->getData($data, 'name'));
    }

    /**
     * @dataProvider badArrayDataProvider
     * @param $data
     * @expectedException \Exception
     */
    public function testBadArrayValidatorData($data)
    {
        $arrayValidator = new ArrayValidator();
        $arrayValidator->getData($data, 'name');
    }

    /**
     * @dataProvider goodObjectDataProvider
     * @param $data
     */
    public function testGoodObjectValidatorData($data)
    {
        $arrayValidator = new ObjectValidator();
        $this->assertEquals('data', $arrayValidator->getData($data, 'name'));
    }

    /**
     * @dataProvider badObjectDataProvider
     * @param $data
     * @expectedException \Exception
     */
    public function testBadObjectValidatorData($data)
    {
        $arrayValidator = new ObjectValidator();
        $arrayValidator->getData($data, 'name');
    }

    /**
     * @dataProvider goodArrayDataProvider
     * @param $data
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
     * @dataProvider goodObjectDataProvider
     * @param $data
     */
    public function testGoodObjectValidatorValidateData($data)
    {
        $rules = [
            'name' => [
                new NotEmpty(),
                new StringType(),
            ]
        ];

        $arrayValidator = new ObjectValidator();
        $this->assertEquals([], $arrayValidator->validate($data, $rules));
    }

}