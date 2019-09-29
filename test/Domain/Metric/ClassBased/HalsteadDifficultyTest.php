<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\ClassBased;

use PHPQuality\Domain\Metric\ClassBased\HalsteadDifficulty;
use PHPQuality\Domain\Metric\General\Contracts\HalsteadDifficultyInterface;
use PHPQuality\Test\Domain\Metric\General\HalsteadDifficultyTestCase;

final class HalsteadDifficultyTest extends HalsteadDifficultyTestCase
{
    public function getClass(): HalsteadDifficultyInterface
    {
        return new HalsteadDifficulty('foo');
    }
}
