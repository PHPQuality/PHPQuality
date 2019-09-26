<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\MethodBased;

use PHPQuality\Domain\Metric;
use PHPQuality\Domain\Metric\MethodBased;

abstract class MethodBasedMetric implements MethodBased, Metric
{
    /** @var string */
    private $class;
    /** @var string */
    private $method;

    final public function __construct(string $class, string $method)
    {
        $this->class  = $class;
        $this->method = $method;
    }

    final public function getClass(): string
    {
        return $this->class;
    }

    final public function getMethod(): string
    {
        return $this->method;
    }
}
