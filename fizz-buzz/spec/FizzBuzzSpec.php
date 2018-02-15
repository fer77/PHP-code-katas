<?php 

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FizzBuzzSpec extends ObjectBehavior {

	function it_translates_1_for_fizzbuzz()
	{
		$this->execute(1)->shouldReturn(1);
	}
}
