<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\MethodBased;

use PHPQuality\Domain\Metric\General\Contracts\HalsteadDifficultyInterface;
use PHPQuality\Domain\Metric\General\HalsteadDifficulty as DifficultyTrait;

/**
 * @psalm-external-mutation-free
 */
final class HalsteadDifficulty extends MethodBasedMetric implements HalsteadDifficultyInterface
{
    use DifficultyTrait;
}
