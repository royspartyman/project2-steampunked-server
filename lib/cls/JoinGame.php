<?php

class JoinGame extends Table
{

    public function __construct(Site $site)
    {
        parent::__construct($site, "steampunked_game");

    }


    public function joinGame($userid, $gameId)
    {

        $this->RemoveGameFromRecord($userid);

        $sql = <<<SQL
UPDATE $this->tableName
SET playerTwoId=?
where gameId=?
SQL;
        $statement = $this->pdo()->prepare($sql);
        if ($statement->execute(array($userid, $gameId))) {
            $message = "success";
            echo $message;
            return $message;
        } else {
            return null;
        }

        return null;
    }


    public function CheckIfThereIsAGame($userid)
    {

        $sql = <<<SQL
SELECT * FROM $this->tableName WHERE (playerTwoId IS NULL OR playerTwoId ='') AND (playerOneId IS NOT NULL) AND (playerOneId <> ?)
SQL;

        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($userid));

        if ($statement->rowCount() === 0) {
            return null;
        } else {
            $result = array();  // Empty initial array
            foreach ($statement as $row) {
                $result[] = new Game($row);
            }

            foreach ($result as $g) {
                $gameId = $g->getGameId();

            }
            $final = $this->joinGame($userid, $gameId);
            return $final;
        }
        //return  $final;
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