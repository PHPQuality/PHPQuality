<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\General;

use PHPQuality\Domain\Metric\Exception\UnableToCalculate;

/**
 * @psalm-external-mutation-free
 */
trait HalsteadBugs
{
    /** @var float|null */
    private $effort = null;

    final public function setEffort(float $effort): void
    {
        $this->effort = $effort;
    }

    final public function calculate(): float
    {
        if ($this->effort === null) {
            throw UnableToCalculate::unknownEffort();
        }

        return ($this->effort ** (2 / 3)) /3000;
    }

    final public function name(): string
    {
        return 'Halstead Bugs';
    }

    final public function description(): string
    {
        return 'Halstead bugs represents the number of expected bugs in a given piece of code, Calculated as follows:' .
           '(Volume^2/3)/ 3000';
    }

    final public function abbreviation(): string
    {
        return 'Bugs';
    }
}
