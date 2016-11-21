<?php

class NewGame extends Table{

    public function __construct(Site $site) {
        parent::__construct($site, "SteampunkedGame");

    }

    public function newGame($userid,$token,$game) {

        $this->RemoveGameFromRecord($userid);


        $sql2 = <<<SQL
INSERT INTO gcm(token,username)
values(?, ?)
SQL;

        $statement2 = $this->pdo()->prepare($sql2);
        $statement2->execute(array($token,$userid));





// Add a record to the newuser table
        $sql = <<<SQL
REPLACE INTO $this->tableName(playerOneId, game)
values(?, ?)
SQL;

        $statement = $this->pdo()->prepare($sql);
        if($statement->execute(array($userid,$game))){
            $message = "success";
            return $message;

        }else{

            $message = null;
            return $message;
        }

    }

    public function RemoveGameFromRecord($userId){

        $sql = <<<SQL
DELETE  FROM  $this->tableName
where playerOneId=? OR playerTwoId=?
SQL;
        $statement = $this->pdo()->prepare($sql);
        $statement->execute(array($userId,$userId));

    }

}
