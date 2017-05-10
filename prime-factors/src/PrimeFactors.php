<?php

class PrimeFactors {
	public function generate($number) {
		$primes = []; // [2, 2]

		for ($divisible = 2; $number > 1; $divisible++) 
		{
			for (; $number % $divisible === 0; $number /= $divisible)
			{
				$primes[] = $divisible;
			}
		}

		return $primes;
	}
}
