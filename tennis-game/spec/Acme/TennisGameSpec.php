<?php

namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Acme\Player;

class TennisGameSpec extends ObjectBehavior
{
  protected $bob;
  protected $linda;

  function let()
  {
    $this->bob = new Player('Bob Belcher', 0);
    $this->linda = new Player('Linda Belcher', 0);

    $this->beConstructedWith($this->bob, $this->linda);
  }

  function it_scores_a_scoreless_game()
  {
    $this->score()->shouldReturn('Love-All');
  }
  function it_scores_a_1_0_game()
  {
    $this->bob->scoresPoints(1);
    $this->score()->shouldReturn('Fifteen-Love');
  }
  function it_scores_a_2_0_game()
  {
    $this->bob->scoresPoints(2);
    $this->score()->shouldReturn('Thirty-Love');
  }
  function it_scores_a_3_0_game()
  {
    $this->bob->scoresPoints(3);
    $this->score()->shouldReturn('Forty-Love');
  }
  function it_scores_a_4_0_game()
  {
    $this->bob->scoresPoints(4);
    $this->score()->shouldReturn('Win for Bob Belcher');
  }
  function it_scores_a_0_4_game()
  {
    $this->linda->scoresPoints(4);
    $this->score()->shouldReturn('Win for Linda Belcher');
  }
  function it_scores_a_4_3_game()
  {
    $this->bob->scoresPoints(4);
    $this->linda->scoresPoints(3);
    $this->score()->shouldReturn('Advantage Bob Belcher');
  }
  function it_scores_a_3_4_game()
  {
    $this->bob->scoresPoints(3);
    $this->linda->scoresPoints(4);
    $this->score()->shouldReturn('Advantage Linda Belcher');
  }
  function it_scores_a_4_4_game()
  {
    $this->bob->scoresPoints(3);
    $this->linda->scoresPoints(3);
    $this->score()->shouldReturn('Deuce');
  }
}
