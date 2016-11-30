<?php

class Site
{

    private $email = '';
    private $dbHost = null;
    private $dbUser = null;
    private $dbPassword = null;
    private $tablePrefix = '';
    private $root = '';
    private $pdo = null;

    public function getTablePrefix()
    {
        return $this->tablePrefix;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getRoot()
    {
        return $this->root;
    }

    public function setRoot($root)
    {
        $this->root = $root;
    }  ///< Database table prefix


    public function dbConfigure($host, $user, $password, $prefix)
    {
        $this->dbHost = $host;
        $this->dbUser = $user;
        $this->dbPassword = $password;
        $this->tablePrefix = $prefix;
    }

    function pdo()
    {
        if ($this->pdo !== null) {
            return $this->pdo;
        }

        try {
            $this->pdo = new PDO($this->dbHost, $this->dbUser, $this->dbPassword);

        } catch (PDOException $e) {
            die("Unable to select database");
        }
        return $this->pdo;
    }
}