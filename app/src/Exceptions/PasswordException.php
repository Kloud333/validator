<?php

namespace app\src\Exceptions;

class PasswordException
{
    /**
     * @var string
     */
    public $errorMessage;

    /**
     * PasswordException constructor.
     * @param $errorMessage
     */
    public function __construct($errorMessage)
    {
        $this->errorMessage = $errorMessage;
    }
}