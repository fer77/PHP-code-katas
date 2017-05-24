<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BowlingGameSpec extends ObjectBehavior
{
	function it_scores_a_gutter_game_as_zero()
	{
		for ($i = 0; $i<20; $i++)
		{
			$this->roll(0);
		}
		$this->score()->shouldBe(0);
	}
}
