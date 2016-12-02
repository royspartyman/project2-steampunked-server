<?php

class UpdateGame extends Table
{


    public function __construct(Site $site)
    {
        parent::__construct($site, "steampunked_game");

    }


    public function SetGame($userId, $game)
    {

        $sql = <<<SQL
UPDATE $this->tableName
SET game=?
where playerOneId=? OR playerTwoId=?
SQL;

        $statement = $this->pdo()->prepare($sql);
        if ($statement->execute(array($game, $userId, $userId))) {
            $message = "success";
            return $message;

        } else {
            return null;
        }
    }

}
