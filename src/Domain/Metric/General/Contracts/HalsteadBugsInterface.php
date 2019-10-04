<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\General\Contracts;

use PHPQuality\Domain\Metric;

interface HalsteadBugsInterface extends Metric
{
    public function setEffort(float $effort): void;
}
