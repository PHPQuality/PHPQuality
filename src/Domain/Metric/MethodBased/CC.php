<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\MethodBased;

/**
 * @psalm-external-mutation-free
 */
final class CC extends MethodBasedMetric
{
    /** @var int */
    private $complexity = 0;

    /**
     * Should be called whenever a statement that increases the complexity is found
     */
    public function increaseComplexity(): void
    {
        $this->complexity++;
    }

    public function calculate(): float
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
