<?php

class Users extends Table
{


    public function __construct(Site $site)
    {
        parent::__construct($site, "steampunked_user");

    }


    public function login($user, $password)
    {

        $sql = <<<SQL
SELECT * from $this->tableName
where username=?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($user));
        if ($statement->rowCount() === 0) {
            return null;
        }

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        $pass = $row['password'];

        if ($password !== $pass) {
            return null;
        }


        return new User($row);
    }


    public function exists($username)
    {
        $sql = <<<SQL
SELECT * from $this->tableName
where username=?
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($username));
        if ($statement->rowCount() === 0) {
            return false;
        } else {
            return true;
        }

    }
}