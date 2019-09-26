<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\MethodBased;

final class CC extends MethodBasedMetric
{
    /** @var int */
    private $complexity = 0;

    public function increaseComplexity(): void
    {
        $this->complexity++;
    }

    public function calculate(): int
    {
        return $this->complexity;
    }

    public function name(): string
    {
        return 'Cyclomatic Complexity';
    }

    public function description(): string
    {
        return 'Cyclomatic complexity. Is the total number of `if`, `elseif`, `else`, `switch`, `case`, and loops in a method.';
    }

    public function abbreviation(): string
    {
        return 'CC';
    }
}
