<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\General\Contracts;

interface HalsteadEffortInterface
{
    public function setDifficultyAndVolume(float $difficulty, float $volume): void;

    public function calculate(): float;
}
