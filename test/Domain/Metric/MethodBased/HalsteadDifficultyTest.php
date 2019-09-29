<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\MethodBased;

use PHPQuality\Domain\Metric\General\Contracts\HalsteadDifficultyInterface;
use PHPQuality\Domain\Metric\MethodBased\HalsteadDifficulty;
use PHPQuality\Test\Domain\Metric\General\HalsteadDifficultyTestCase;

final class HalsteadDifficultyTest extends HalsteadDifficultyTestCase
{
    public function getClass(): HalsteadDifficultyInterface
    {
        return new HalsteadDifficulty('foo', 'method');
    }
}
