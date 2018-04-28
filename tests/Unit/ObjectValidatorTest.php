<?php

namespace tests\Unit;

use app\src\ObjectValidator;
use app\src\Rules\NotEmpty;
use app\src\Rules\StringType;
use stdClass;

class ObjectValidatorTest extends Base
{
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
    public function badObjectDataProvider()
    {
        $object = new StdClass();

        return [
            [$object],
        ];
    }

    /**
     * @dataProvider goodObjectDataProvider
     * @param $data
     * @covers \app\src\ObjectValidator::getData()
     */
    public function testGoodObjectValidatorData($data)
    {
        $arrayValidator = new ObjectValidator();
        $this->assertEquals('data', $arrayValidator->getData($data, 'name'));
    }

    /**
     * @dataProvider badObjectDataProvider
     * @param $data
     * @covers \app\src\ObjectValidator::getData()
     * @expectedException \Exception
     */
    public function testBadObjectValidatorData($data)
    {
        $arrayValidator = new ObjectValidator();
        $arrayValidator->getData($data, 'name');
    }

    /**
     * @dataProvider goodObjectDataProvider
     * @param $data
     * @covers \app\src\ObjectValidator::validate()
     * @covers \app\src\ObjectValidator::validateData()
     * @covers \app\src\ObjectValidator::checkValidationData()
     */
    public function testGoodObjectValidatorValidateData($data)
    {
        $rules = [
            'name' => [
                new NotEmpty(),
                new StringType(),
            ]
        ];

        $objectValidator = new ObjectValidator();
        $this->assertEquals([], $objectValidator->validate($data, $rules));
    }

    /**
     * @dataProvider badObjectDataProvider
     * @param $data
     * @covers \app\src\ObjectValidator::validate()
     * @covers \app\src\ObjectValidator::validateData()
     * @covers \app\src\ObjectValidator::checkValidationData()
     * @expectedException \Exception
     */
    public function testBadObjectValidatorValidateData($data)
    {
        $rules = [
            'name' => [
                new NotEmpty(),
                new StringType(),
            ]
        ];

        $objectValidator = new ObjectValidator();
        $this->assertEquals([], $objectValidator->validate($data, $rules));
    }
}