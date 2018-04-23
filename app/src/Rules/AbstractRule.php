<?php

namespace app\src\Rules;

abstract class AbstractRule
{
    /**
     * @param $data
     * @return bool
     */
    public abstract function validate($data);

    /**
     * @param $data
     * @return mixed
     */
    public function check($data)
    {
        if ($data != true) {
            return $this->createException();
        }

        return $data;
    }

    /**
     * @return mixed
     */
    protected function createException()
    {
        $currentFqn = get_called_class();
        $exceptionFqn = str_replace('\\Rules\\', '\\Exceptions\\', $currentFqn);
        $exceptionFqn .= 'Exception';

        return new $exceptionFqn();
    }

    /**
     * @param $data
     * @return mixed
     */
    public function validation($data)
    {
        $dataRule = $this->validate($data);
        $result = $this->check($dataRule);

        return $result;
    }

}