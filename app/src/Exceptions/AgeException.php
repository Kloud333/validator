<?php

namespace app\src\Exceptions;

class AgeException
{
    public $message;

    public function __construct($message)
    {
        $this->message = 'Your age is less than. . . .' . $message;
    }
}