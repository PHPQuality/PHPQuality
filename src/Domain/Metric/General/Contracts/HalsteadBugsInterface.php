<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\General\Contracts;

interface HalsteadBugsInterface
{
    public function setEffort(float $effort): void;

    public function calculate(): float;
}
