<?php

/**
 * @param $number
 * @return array
 */

class FizzBuzz {

	public function execute($number)
	{
		if ($number % 15 == 0) return 'fizzBuzz';
		if ($number % 3 == 0) return 'fizz';
		if ($number % 5 == 0) return 'Buzz';
		
		return $number;
	}

	public function executeUpTo($number)
	{
		$output = [];

		foreach (range(1, $number) as $i)
		{
			$output[] = $this->execute($i);
		}
		
		return $output;
	}
}
