<?php

class GetGameStatus extends Table
{


    public function __construct(Site $site)
    {
        parent::__construct($site, "steampunked_game");

    }


    public function getGame($userid)
    {

        $sql = <<<SQL
SELECT * FROM  $this->tableName
where playerOneId=? OR playerTwoId=? LIMIT 1
SQL;

        $rows = $this->pdo()->prepare($sql);
        $rows->execute(array($userid, $userid));

        $data = "";
        foreach ($rows as $row) {

            $data = $row['game'];

        }

        echo $data;
        exit;

    }

    public function CheckIfReady($userid)
    {


        $sql = <<<SQL
SELECT playerTwoId FROM $this->tableName WHERE (playerOneId = ?)
SQL;
        $row = $this->pdo()->prepare($sql);
        $row->execute(array($userid));
        $data = $row->fetch();

        if($data[0] == ""){
            return null;
        }else{
            return true;
        }
    }

    public function getOtherUser($userid)
    {

        $sql = <<<SQL
SELECT playerTwoId FROM $this->tableName WHERE (playerOneId = ?)
SQL;
        $row = $this->pdo()->prepare($sql);
        $row->execute(array($userid));
        $data = $row->fetch();

        if($data[0] == $userid || $data[0] == ""){
            $sql = <<<SQL
SELECT playerOneId FROM $this->tableName WHERE (playerTwoId = ?)
SQL;
            $row = $this->pdo()->prepare($sql);
            $row->execute(array($userid));
            $data = $row->fetch();
        }

        $sql = <<<SQL
UPDATE $this->tableName
SET currentPlayer = ?
where playerOneId = ? OR playerTwoId = ?
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($data[0], $userid, $userid));

        $message = "success";
        return $message;
    }

    public function getPlayerTwo($userid)
    {
        $sql = <<<SQL
SELECT playerTwoId FROM $this->tableName WHERE (playerOneId = ?)
SQL;
        $row = $this->pdo()->prepare($sql);
        $row->execute(array($userid));
        $data = $row->fetch();

        return $data[0];
    }

    public function getPlayerOne($userid)
    {
        $sql = <<<SQL
SELECT playerOneId FROM $this->tableName WHERE (playerTwoId = ?)
SQL;
        $row = $this->pdo()->prepare($sql);
        $row->execute(array($userid));
        $data = $row->fetch();

        return $data[0];
    }

    public function getCurrentPlayer($userid)
    {
        $sql = <<<SQL
SELECT currentPlayer FROM $this->tableName WHERE (playerOneId = ? OR playerTwoId = ?)
SQL;
        $row = $this->pdo()->prepare($sql);
        $row->execute(array($userid, $userid));
        $data = $row->fetch();
        return $data[0];
    }
}