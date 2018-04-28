<?php

namespace app\src\Exceptions;

class AgeException
{
    /**
     * @var string
     */
    public $errorMessage;

    /**
     * AgeException constructor.
     * @param $errorMessage
     */
    public function __construct($errorMessage)
    {
        $this->errorMessage = 'Your age is less than. . . .' . $errorMessage;
    }
}