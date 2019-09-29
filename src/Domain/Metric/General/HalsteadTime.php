<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\General;

use PHPQuality\Domain\Metric\Exception\UnableToCalculate;

/**
 * @psalm-external-mutation-free
 */
trait HalsteadTime
{
    /** @var int  */
    private $effort = 0;

    final public function setEffort(int $effort): void
    {
        $this->effort = $effort;
    }

    final public function calculate(): float
    {
        if ($this->effort === 0) {
            throw UnableToCalculate::unknownEffort();
        }

        return $this->effort / 18;
    }

    final public function name(): string
    {
        return 'Halstead Time';
    }

    final public function description(): string
    {
        return 'Halstead Time is the time requried to program this code. Calculated as follows: Effort / 18';
    }

    final public function abbreviation(): string
    {
        return 'Time';
    }
}
