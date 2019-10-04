<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\General;

use PHPQuality\Domain\Metric\Exception\UnableToCalculate;
use Webmozart\Assert\Assert;

/**
 * @psalm-external-mutation-free
 */
trait HalsteadEffort
{
    /** @var float|null  */
    private $difficulty;
    /** @var float|null  */
    private $volume;

    final public function setDifficultyAndVolume(float $difficulty, float $volume): void
    {
        Assert::allGreaterThan([$difficulty, $volume], 0);

        $this->difficulty = $difficulty;
        $this->volume     = $volume;
    }

    final public function calculate(): float
    {
        if ($this->difficulty === null || $this->volume === null) {
            throw UnableToCalculate::missingData('difficulty', 'volume');
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
