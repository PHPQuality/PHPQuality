<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric;

interface ClassBased
{
    public function className(): string;
}
