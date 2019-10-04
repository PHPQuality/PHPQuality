<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\General;

use PHPQuality\Domain\Metric\Exception\UnableToCalculate;
use Webmozart\Assert\Assert;

/**
 * @psalm-external-mutation-free
 */
trait HalsteadTime
{
    /** @var float|null  */
    private $effort;

    final public function setEffort(float $effort): void
    {
        Assert::greaterThan($effort, 0);
        $this->effort = $effort;
    }

    final public function calculate(): float
    {
        if ($this->effort === null) {
            throw UnableToCalculate::missingData('effort');
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
