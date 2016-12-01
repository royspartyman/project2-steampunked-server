<?php

class Game
{

    private $Id;
    private $username1;
    private $username2;
    private $game;

    public function __construct($row)
    {
        $this->Id = $row['gameId'];
        $this->username1 = $row['playerOneId'];
        $this->username2 = $row['playerTwoId'];
        $this->currentPlayer = $row['currentPlayer'];
        $this->game = $row['game'];

    }


    public function getGameId()
    {
        return $this->Id;
    }

    public function getPlayerOne()
    {
        return $this->username1;
    }

    public function getPlayerTwo()
    {
        return $this->username2;
    }

    public function getCurrentPlayer()
    {
        return $this->currentPlayer;
    }

    public function getTheGame()
    {
        return $this->game;
    }

}