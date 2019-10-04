<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\General\Contracts;

interface HalsteadDifficultyInterface
{
    public function setData(int $distinctOperators, int $distinctOperands, int $totalOperands): void;

    public function calculate(): float;
}
