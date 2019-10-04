<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\MethodBased;

use PHPQuality\Domain\Metric\General\Contracts\HalsteadEffortInterface;
use PHPQuality\Domain\Metric\General\HalsteadEffort as HalsteadEffortTrait;

/**
 * @psalm-external-mutation-free
 */
final class HalsteadEffort extends MethodBasedMetric implements HalsteadEffortInterface
{
    use HalsteadEffortTrait;
}
