<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\General;

use Generator;
use PHPQuality\Domain\Metric\General\Contracts\HalsteadDifficultyInterface;
use PHPStan\Testing\TestCase;
use function round;

abstract class HalsteadDifficultyTestCase extends TestCase
{
    /**
     * @dataProvider provideDataAndDifficulty
     */
    final public function testItCalculatesCorrectly(int $distinctOperators, int $distinctOperands, int $totalOperands, float $difficultyIndicator): void
    {
        $difficulty = $this->getClass();
        $difficulty->setData($distinctOperators, $distinctOperands, $totalOperands);
        self::assertSame($difficultyIndicator, round($difficulty->calculate(), 2));
    }

    final public function provideDataAndDifficulty(): Generator
    {
        yield [12, 7, 15, 12.86];
    }

    abstract public function getClass(): HalsteadDifficultyInterface;
}
