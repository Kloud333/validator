<?php

namespace app\src\Exceptions;

class PasswordException
{
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }
}