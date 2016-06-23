<?php

class UserValidate
{

    private $requiredParameters = [
        "name" ,"lastName","email","pass","gender","birthdate"
    ];


    public function isValid($parameters)
    {

        foreach ($parameters as $key=>$value)
        {
            if (!$this->isInside($key, $value))
            {
                echo "Missing parameters: ";
                return false;
            }

            $this->emailValidate($key,$value);
            $this->passValidate($key,$value);

            return true;

        }
    }

    private function isInside($key, $value)
    {

        foreach ( $this->requiredParameters as $keyArray)
        {
            if ($keyArray != $key)
                echo ("Argugumento Obrigatório: ".$key);
                return false;

            if ($value == "")
                return false;
        }
        return true;
    }

    private function emailValidate($key, $value)
    {
        if($key == "email")
        {
            $validate = strstr($value, '@');
            return true;
        }

        return false;
    }

    private function passValidate($key1, $value)
    {
        if ($key1 == "pass")
        {
            $cript = md5($value);
            return $value=$cript;
        }

    }

}