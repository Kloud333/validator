<?php

namespace app\src\Rules;

use DateTime;

class Age extends AbstractRule
{
    public $age;

    /**
     * Age constructor.
     * @param $age
     */
    public function __construct($age)
    {
        $this->age = $age;
    }

    /**
     * @param $data
     * @return bool
     */
    public function validate($data)
    {
        $date = new DateTime($data);
        $now = new DateTime;
        $diff = $now->diff($date);
        return ($diff->y > $this->age);
    }
}