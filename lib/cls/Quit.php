<?php

class Quit extends Table
{


    public function __construct(Site $site)
    {
        parent::__construct($site, "steampunked_game");

    }



    public function QuitGame($userId)
    {
        $this->RemoveGameFromRecord($userId);
    }


    public function RemoveGameFromRecord($userId)
    {

        $sql = <<<SQL
DELETE * FROM  $this->tableName
where playerOneId=? OR playerTwoId=?
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($userId, $userId));
    }
}

