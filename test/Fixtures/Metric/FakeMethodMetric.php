<?php

declare(strict_types=1);

namespace PHPQuality\Test\Fixtures\Metric;

use ErrorException;
use PHPQuality\Domain\Metric;

final class FakeMethodMetric implements Metric
{
    /** @var int */
    private $complexity;

    public function __construct(int $complexity)
    {
        $this->complexity = $complexity;
    }

    public function calculate(): int
    {
        return $this->complexity;
    }

    /**
     * Should not be called
     */
    public function name(): string
    {
        throw new ErrorException();
    }

    /**
     * Should not be called
     */
    public function description(): string
    {
        throw new ErrorException();
    }

    /**
     * Should not be called
     */
    public function abbreviation(): string
    {
        throw new ErrorException();
    }
}
