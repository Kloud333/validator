<?php

namespace app\src\Rules;

abstract class AbstractRule
{
    /**
     * @return object
     */
    protected function createException($errorMessage = null)
    {
        $exceptionObject = str_replace('\\Rules\\', '\\Exceptions\\', get_called_class()) . 'Exception';
        return new $exceptionObject($errorMessage);
    }
}