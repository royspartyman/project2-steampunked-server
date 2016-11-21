<?php

class GetGameStatus extends Table{


    public function __construct(Site $site)
    {
        parent::__construct($site, "SteampunkedGame");

    }


    public function getGame($userid)
    {

        $sql = <<<SQL
SELECT * FROM  $this->tableName
where playerOneId=? OR playerTwoId=? LIMIT 1
SQL;

                $rows = $this->pdo()->prepare($sql);
                $rows->execute(array($userid,$userid));

                $data ="";
                foreach($rows as $row){

                    $data = $row['game'];

                }

                echo  $data;
                exit;

    }
}
