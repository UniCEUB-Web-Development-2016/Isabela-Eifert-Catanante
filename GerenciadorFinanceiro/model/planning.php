<?php


class planning
{
    private $name;
    private $currentValue;
    private $finalValue;
    private $initialDate;
    private $finalDate;
    private $description;

    /**
     * planning constructor.
     */
    public function __construct($name, $currentValue, $finalValue, $initialValue, $finalDate, $description)
    {
        $this ->setName($name);
        $this ->setCurrentValue($currentValue);
        $this ->setFinalValue($finalValue);
        $this ->setInitialDate($initialValue);
        $this ->setFinalDate($finalDate);
        $this ->setDescription($description);
    }

    /**
     * @return mixed
     */
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
    public function getCurrentValue()
    {
        return $this->currentValue;
    }

    /**
     * @param mixed $currentValue
     */
    public function setCurrentValue($currentValue)
    {
        $this->currentValue = $currentValue;
    }

    /**
     * @return mixed
     */
    public function getFinalValue()
    {
        return $this->finalValue;
    }

    /**
     * @param mixed $finalValue
     */
    public function setFinalValue($finalValue)
    {
        $this->finalValue = $finalValue;
    }

    /**
     * @return mixed
     */
    public function getInitialDate()
    {
        return $this->initialDate;
    }

    /**
     * @param mixed $initialDate
     */
    public function setInitialDate($initialDate)
    {
        $this->initialDate = $initialDate;
    }

    /**
     * @return mixed
     */
    public function getFinalDate()
    {
        return $this->finalDate;
    }

    /**
     * @param mixed $finalDate
     */
    public function setFinalDate($finalDate)
    {
        $this->finalDate = $finalDate;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


}

