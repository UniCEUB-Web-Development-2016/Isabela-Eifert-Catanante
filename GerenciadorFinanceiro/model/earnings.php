<?php

include "user.php";
include "planning.php";

class earnings
{
    private $id;
    private $name;
    private $value;
    private $type;
    private $date;

    /**
     * earningsController constructor.
     */
    public function __construct($name, $value, $type, $date)
    {
        $this->setName($name);
        $this->setValue($value);
        $this->setType($type);
        $this ->setDate($date);
    }
    
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


}