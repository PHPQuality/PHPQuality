<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\MethodBased;

use PHPQuality\Domain\Metric\General\Contracts\HalsteadVolumeInterface;
use PHPQuality\Domain\Metric\General\HalsteadVolume as HalsteadVolumeTrait;

/**
 * @psalm-external-mutation-free
 */
final class HalsteadVolume extends MethodBasedMetric implements HalsteadVolumeInterface
{
    use HalsteadVolumeTrait;
}
