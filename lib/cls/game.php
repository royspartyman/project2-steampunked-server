<?php

class Game {
    private $Id;        ///< ID for this user.xml in the user.xml table
    private $username1;    ///< User-supplied ID
    private $username2;      ///< What we call you by
    private $game;



    public function __construct($row) {
        $this->Id = $row['gameId'];
        $this->username1 = $row['playerOneId'];
        $this->username2 = $row['playerTwoId'];
        $this->game = $row['game'];

    }


    /**
     * @return mixed
     */
    public function getGameId()
    {
        return $this->Id;
    }

    /**
     * @return mixed
     */
    public function getPlayerOne()
    {
        return $this->username1;
    }

    /**
     * @return mixed
     */
    public function getPlayerTwo()
    {
        return $this->username2;
    }

    public function getTheGame()
    {
        return $this->game;
    }

}
