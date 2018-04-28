<?php

namespace tests\Unit;

use app\src\Rules\Age;
use app\src\Rules\Date;
use app\src\Rules\Email;
use app\src\Rules\NotEmpty;
use app\src\Rules\Password;
use app\src\Rules\StringType;

class RulesTest extends Base
{

    /**
     * @return array
     */
    public function goodStringDataProvider()
    {
        return [
            ['string'],
            ['1456']
        ];
    }

    /**
     * @return array
     */
    public function goodAgeDataProvider()
    {
        return [
            ['1984-08-11'],
            ['1975-09-10']
        ];
    }

    /**
     * @return array
     */
    public function goodDateDataProvider()
    {
        return [
            ['1984-08-11'],
            ['1975-09-10']
        ];
    }

    /**
     * @return array
     */
    public function goodEmailDataProvider()
    {
        return [
            ['example@gmail.com'],
            ['test@i.ua']
        ];
    }

    /**
     * @return array
     */
    public function goodNotEmptyDataProvider()
    {
        return [
            ['somedata'],
            [123]
        ];
    }

    /**
     * @return array
     */
    public function goodPasswordDataProvider()
    {
        return [
            ['145Aa5'],
            ['147A8d'],
        ];
    }

    /**
     * @return array
     */
    public function badStringDataProvider()
    {
        return [
            [123],
            [null]
        ];
    }

    /**
     * @return array
     */
    public function badAgeDataProvider()
    {
        return [
            ['1998-08-11'],
            [null]
        ];
    }

    /**
     * @return array
     */
    public function badDateDataProvider()
    {
        return [
            ['1998-08-11'],
            [null]
        ];
    }

    /**
     * @return array
     */
    public function badEmailDataProvider()
    {
        return [
            ['bademail'],
            ['notgoodemail@dot@com']
        ];
    }

    /**
     * @return array
     */
    public function badNotEmptyDataProvider()
    {
        return [
            [''],
            [null]
        ];
    }

    /**
     * @return array
     */
    public function badPasswordDataProvider()
    {
        return [
            ['1245'],
            ['a123454'],
            ['adefrt'],
            ['1478A892']
        ];
    }

    /**
     * @dataProvider goodStringDataProvider
     * @param $data
     */
    public function testGoodStringData($data)
    {

        $stringTypeClass = new StringType();
        $this->assertEquals(true, $stringTypeClass->validate($data));
    }

    /**
     * @dataProvider badStringDataProvider
     * @param $data
     */
    public function testBadStringData($data)
    {
        $stringTypeClass = new StringType();
        $this->assertEquals(false, is_a($stringTypeClass->validate($data),str_replace('\\Rules\\', '\\Exceptions\\', get_called_class()) . 'Exception'));
    }

    /**
     * @dataProvider goodAgeDataProvider
     * @param $data
     */
    public function testGoodAgeData($data)
    {

        $stringTypeClass = new Age(18);
        $this->assertEquals(true, $stringTypeClass->validate($data));
    }

    /**
     * @dataProvider badAgeDataProvider
     * @param $data
     */
    public function testBadAgeData($data)
    {
        $stringTypeClass = new Age(18);
        $this->assertEquals(false, is_a($stringTypeClass->validate($data),str_replace('\\Rules\\', '\\Exceptions\\', get_called_class()) . 'Exception'));
    }

    /**
     * @dataProvider goodDateDataProvider
     * @param $data
     */
    public function testGoodDateData($data)
    {

        $stringTypeClass = new Date('Y-m-d');
        $this->assertEquals(true, $stringTypeClass->validate($data));
    }

    /**
     * @dataProvider badDateDataProvider
     * @param $data
     */
    public function testBadDateData($data)
    {
        $stringTypeClass = new Date('Y-m-d');
        $this->assertEquals(false, is_a($stringTypeClass->validate($data),str_replace('\\Rules\\', '\\Exceptions\\', get_called_class()) . 'Exception'));
    }

    /**
     * @dataProvider goodEmailDataProvider
     * @param $data
     */
    public function testGoodEmailData($data)
    {

        $stringTypeClass = new Email();
        $this->assertEquals(true, $stringTypeClass->validate($data));
    }

    /**
     * @dataProvider badEmailDataProvider
     * @param $data
     */
    public function testBadEmailData($data)
    {
        $stringTypeClass = new Email();
        $this->assertEquals(false, is_a($stringTypeClass->validate($data),str_replace('\\Rules\\', '\\Exceptions\\', get_called_class()) . 'Exception'));
    }

    /**
     * @dataProvider goodNotEmptyDataProvider
     * @param $data
     */
    public function testGoodNotEmptyData($data)
    {

        $stringTypeClass = new NotEmpty();
        $this->assertEquals(true, $stringTypeClass->validate($data));
    }

    /**
     * @dataProvider badNotEmptyDataProvider
     * @param $data
     */
    public function testBadNotEmptyData($data)
    {
        $stringTypeClass = new NotEmpty();
        $this->assertEquals(false, is_a($stringTypeClass->validate($data),str_replace('\\Rules\\', '\\Exceptions\\', get_called_class()) . 'Exception'));
    }

    /**
     * @dataProvider goodPasswordDataProvider
     * @param $data
     */
    public function testGoodPasswordData($data)
    {

        $stringTypeClass = new Password();
        $this->assertEquals(true, $stringTypeClass->validate($data));
    }

    /**
     * @dataProvider badPasswordDataProvider
     * @param $data
     */
    public function testBadPasswordData($data)
    {
        $stringTypeClass = new Password();
        $this->assertEquals(false, is_a($stringTypeClass->validate($data),str_replace('\\Rules\\', '\\Exceptions\\', get_called_class()) . 'Exception'));
    }

}