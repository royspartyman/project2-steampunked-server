<?php

class NewGame extends Table
{

    public function __construct(Site $site)
    {
        parent::__construct($site, "steampunked_game");

    }

    public function newGame($userid, $game)
    {

        $this->RemoveGameFromRecord($userid);

// Add a record to the newuser table
        $sql = <<<SQL
REPLACE INTO $this->tableName(playerOneId, currentPlayer, game)
values(?, ?, ?)
SQL;

        $statement = $this->pdo()->prepare($sql);
        if ($statement->execute(array($userid, $userid, $game))) {
            $message = "success";
            return $message;

        } else {
            $message = null;
            return $message;
        }

    }

    public function RemoveGameFromRecord($userId)
    {

        $sql = <<<SQL
DELETE  FROM  $this->tableName
where playerOneId=? OR playerTwoId=?
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($userId, $userId));

    }

}