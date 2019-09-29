<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\ClassBased;

use PHPQuality\Domain\Metric;
use PHPQuality\Domain\Metric\ClassBased;

/**
 * @psalm-external-mutation-free
 */
abstract class ClassBasedMetric implements ClassBased, Metric
{
    /**
     * @var string
     * @psalm-readonly
     */
    private $className;

    final public function __construct(string $className)
    {
        $this->className = $className;
    }

    final public function className(): string
    {
        return $this->className;
    }
}
