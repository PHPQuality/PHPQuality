<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\General;

use PHPQuality\Domain\Metric\Exception\UnableToCalculate;

/**
 * @psalm-external-mutation-free
 */
trait HalsteadEffort
{
    /** @var int  */
    private $difficulty = 0;
    /** @var int  */
    private $volume = 0;

    final public function setDifficultyAndVolume(float $difficulty, float $volume): void
    {
        $this->difficulty = $difficulty;
        $this->volume     = $volume;
    }

    final public function calculate(): float
    {
        if ($this->difficulty === 0) {
            throw UnableToCalculate::unknownDifficulty();
        }

        if ($this->volume === 0) {
            throw UnableToCalculate::unknownVolume();
        }

        return $this->difficulty * $this->volume;
    }

    final public function name(): string
    {
        return 'Halstead Effort';
    }

    final public function description(): string
    {
        return 'Halstead Effort is the effort needed to work on the program. Calcualted as follows: Difficulty * Volume';
    }

    final public function abbreviation(): string
    {
        return 'Volume';
    }
}
