<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\ClassBased;

use PHPQuality\Domain\Metric;

/**
 * @psalm-external-mutation-free
 */
final class WMC extends ClassBasedMetric
{
    /** @var float */
    private $wmc = 0;

    /**
     * @param Metric $metric The used complexity measure for the method.
     *                       The same complexity measure should be used each time
     */
    public function addMethod(Metric $metric): void
    {
        $this->wmc += $metric->calculate();
    }

    public function calculate(): float
    {
        return $this->wmc;
    }

    public function name(): string
    {
        return 'Weighted Method Complexity';
    }

    public function description(): string
    {
        return 'The weighted method complexity is the sum of the complexities of all the class methods';
    }

    public function abbreviation(): string
    {
        return 'WMC';
    }
}
