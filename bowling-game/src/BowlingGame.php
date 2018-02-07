<?php

class BowlingGame 
{
	protected $rolls = [];

	private function guardAgainstInvalidRoll($pins)
	{
		if ($pins < 0)
		{
			throw new InvalidArgumentException;
		}
	}

	private function isStrike($roll)
		{
			return $this->rolls[ $roll ] == 10;
		}
	private function strikeBonus($roll)
		{
			$this->rolls[$roll + 1] = $this->rolls[$roll + 2];			
		}

	private function isSpare($roll)
		{
			return $this->rolls[$roll] + $this->rolls[$roll + 1] == 10;
		}

	public function spareBonus($roll)
		{
			return $this->rolls[$roll + 2];	
		}

	private function getDefaultFrameScore($roll)
		{
			return $this->rolls[$roll] + $this->rolls[$roll + 1];
		}

	public function roll($pins)
		{
			$this->guardAgainstInvalidRoll($pins);
			$this->rolls[] = $pins;
		}
	public function score() // Responsible for calculating the score.
	{
		$score = 0;
		$roll = 0;

		for ($frame = 1; $frame <= 10; $frame++)
		{
			if ($this->isStrike($roll))
			{
				$score += 10 + $this->rolls[$roll +1] + $this->rolls[$roll + 2];
				$roll += 1;

				continue;
			}
			if ($this->isSpare($roll))
			{
				$score += 10 + $this->spareBonus($roll);
			}
			else
			{
				$score += $this->getDefaultFrameScore($roll);
			}
			$roll += 2;
		}
		return $score;
	}
}