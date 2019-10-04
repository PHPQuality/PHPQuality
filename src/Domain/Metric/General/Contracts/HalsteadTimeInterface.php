<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\General\Contracts;

interface HalsteadTimeInterface
{
    public function setEffort(float $effort): void;

    public function calculate(): float;
}
