<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric;

interface MethodBased
{
    public function getClass(): string;

    public function getMethod(): string;
}
