<?php

//Simple session singleton class.
class SessionSingleton
{
    // Array holding values gathered from $_SESSION.
    protected $arrValues;
    protected static $instance;
    protected function __construct()
    {
        $this->arrValues = $_SESSION;
    }
    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    //Method for getting property value from current session.
    public function get($propertyName = null)
    {
        if ($propertyName === null) {
            return $this->arrValues;
        }
        if (array_key_exists($propertyName, $this->arrValues)) {
            return $this->arrValues[$propertyName];
        }
        return null;
    }

    //Method for setting property and value to current session.
    public function set($propertyName, $propertyValue)
    {
        $this->arrValues[$propertyName] = $propertyValue;
        return true;
    }
    
    //Method for adding new property and value to current session if not exists.
    public function add($propertyName, $propertyValue)
    {
        if (array_key_exists($propertyName, $this->arrValues)) {
            return false;
        }
        $this->arrValues[$propertyName] = $propertyValue;
        return true;
    }
}

