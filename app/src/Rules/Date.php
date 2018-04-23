<?php

namespace app\src\Rules;

use DateTime;

class Date extends AbstractRule
{
    public $format;

    /**
     * Date constructor.
     * @param $format
     */
    public function __construct($format)
    {
        $this->format = $format;
    }

    /**
     * @param $data
     * @return bool
     */
    public function validate($data)
    {
        $date = DateTime::createFromFormat($this->format, $data);
        return $date && $date->format($this->format) == $data;
    }
}