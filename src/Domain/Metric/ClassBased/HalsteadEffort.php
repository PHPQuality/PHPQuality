<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\ClassBased;

use PHPQuality\Domain\Metric\General\Contracts\HalsteadEffortInterface;
use PHPQuality\Domain\Metric\General\HalsteadEffort as HalsteadEffortTrait;

/**
 * @psalm-external-mutation-free
 */
final class HalsteadEffort extends ClassBasedMetric implements HalsteadEffortInterface
{
    use HalsteadEffortTrait;
}
