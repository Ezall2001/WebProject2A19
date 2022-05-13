<?php
class User
{
    private $fullName = null;
    private $userName = null;
    private $email = null;
    private $password = null;

    function __construct($fullName, $userName, $email)
    {
        $this->fullName = $fullName;
        $this->userName = $userName;
        $this->email = $email;
    }

    function getFullName()
    {
        return $this->fullName;
    }
    function getUserName()
    {
        return $this->userName;
    }
    function getEmail()
    {
        return $this->email;
    }
    function setfullName(string $fullName)
    {
        $this->fullName = $fullName;
    }
    function setUserName(string $userName)
    {
        $this->userName = $userName;
    }
    function setEmail(string $email)
    {
        $this->email = $email;
    }
}
