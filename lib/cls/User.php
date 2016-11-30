<?php

class User
{
    private $Id;
    private $username;
    private $password;

    public function __construct($row)
    {
        $this->Id = $row['Id'];
        $this->username = $row['username'];
        $this->password = $row['password'];

    }

    public function getId()
    {
        return $this->Id;
    }

    public function getUserid()
    {
        return $this->username;
    }


    public function getPassword()
    {
        return $this->password;
    }

}