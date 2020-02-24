<?php

class Member
{
    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_seeking;
    private $_bio;

    //Parametrized constructor
    public function __construct($_fname, $_lname, $_age, $_gender, $_phone)
    {
        $this->_fname = $_fname;
        $this->_lname = $_lname;
        $this->_age = $_age;
        $this->_gender = $_gender;
        $this->_phone = $_phone;
    }

    public function getFname()
    {
        return $this->_fname;
    }

    public function setFname($_fname)
    {
        $this->_fname = $_fname;
    }

    public function getLname()
    {
        return $this->_lname;
    }

    public function setLname($_lname)
    {
        $this->_lname = $_lname;
    }

    public function getAge()
    {
        return $this->_age;
    }

    public function setAge($_age)
    {
        $this->_age = $_age;
    }

    public function getGender()
    {
        return $this->_gender;
    }

    public function setGender($_gender)
    {
        $this->_gender = $_gender;
    }

    public function getPhone()
    {
        return $this->_phone;
    }

    public function setPhone($_phone)
    {
        $this->_phone = $_phone;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setEmail($_email)
    {
        $this->_email = $_email;
    }

    public function getState()
    {
        return $this->_state;
    }

    public function setState($_state)
    {
        $this->_state = $_state;
    }

    public function getSeeking()
    {
        return $this->_seeking;
    }

    public function setSeeking($_seeking)
    {
        $this->_seeking = $_seeking;
    }

    public function getBio()
    {
        return $this->_bio;
    }

    public function setBio($_bio)
    {
        $this->_bio = $_bio;
    }
}