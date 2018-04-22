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
     * @param $input
     * @return bool
     */
    public function validate($input)
    {
        $date = DateTime::createFromFormat($this->format, $input);
        return $date && $date->format($this->format) == $input;
    }
}