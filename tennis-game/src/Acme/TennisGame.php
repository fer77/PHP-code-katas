<?php

namespace Acme;

class TennisGame {
    protected $player1;
    protected $player2;

    protected $scoreNames = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty'
    ];

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }
    public function score()
    {

        if ($this->hasWinner())
        {
            return 'Win for ' . $this->winner()->name;
        }

        if ($this->hasTheAdvantage())
        {
            return 'Advantage ' . $this->winner()->name;
        }

        if ($this->inDeuce())
        {
            return 'Deuce';
        }

        $score = $this->scoreNames[$this->player1->points] . '-';
       return $score .= $this->tied() ? 'All' : $this->scoreNames[$this->player2->points];
    }

    private function hasWinner()
    {
        
        return $this->hasEnoughPointsToWin() && $this->isLeadingByTwo();

    }

    private function hasTheAdvantage()
    {
        return $this->hasEnoughPointsToWin() && (abs($this->player1->points - $this->player2->points) >= 1);
    }

    private function inDeuce()
    {
        return $this->player1->points + $this->player2->points >= 6 && $this->tied();
    }

    private function isLeadingByTwo()
    {
        // 3-3 or 4-3 not leading by two
        // 5-3
        return (abs($this->player1->points - $this->player2->points) >= 2);
    }

    private function hasEnoughPointsToWin()
    {
        // leading by 2
        // 4 or more
        return (max([$this->player1->points, $this->player2->points]) >= 4);
    }

    public function winner()
    {
        return $this->player1->points > $this->player2->points ? $this->player1 : $this->player2;
    }

    private function tied()
    {
        return $this->player1->points == $this->player2->points;
    }
}