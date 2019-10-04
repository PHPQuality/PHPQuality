<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\MethodBased;

use PHPQuality\Domain\Metric\General\Contracts\HalsteadTimeInterface;
use PHPQuality\Domain\Metric\General\HalsteadTime as HalsteadTimeTrait;

/**
 * @psalm-external-mutation-free
 */
final class HalsteadTime extends MethodBasedMetric implements HalsteadTimeInterface
{
    use HalsteadTimeTrait;
}
