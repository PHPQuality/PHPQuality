<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\General;

use Generator;
use InvalidArgumentException;
use PHPQuality\Domain\Metric\Exception\UnableToCalculate;
use PHPQuality\Domain\Metric\General\Contracts\HalsteadEffortInterface;
use PHPStan\Testing\TestCase;
use function round;

abstract class HalsteadEffortTestCase extends TestCase
{
    /**
     * @dataProvider provideDataAndDifficulty
     */
    final public function testItCalculatesCorrectly(float $difficulty, float $volume, float $effortIndicator): void
    {
        $effort = $this->getClass();
        $effort->setDifficultyAndVolume($difficulty, $volume);
        self::assertSame($effortIndicator, round($effort->calculate(), 2));
    }

    final public function provideDataAndDifficulty(): Generator
    {
        yield [12, 2, 24.0];
        yield [16, 3, 48];
        yield [16, 1, 16];
        yield [1, 1, 1];
    }

    final public function testErrorsWhenUnableToCalculate(): void
    {
        $e = $this->getClass();
        $this->expectException(UnableToCalculate::class);
        $e->calculate();
    }

    /**
     * @dataProvider provideWrongDifficultyAndVolumes
     */
    final public function testItErrorsWhenWrongDataProvided(float $difficulty, float $volume): void
    {
        $e = $this->getClass();
        $this->expectException(InvalidArgumentException::class);
        $e->setDifficultyAndVolume($difficulty, $volume);
    }

    public function provideWrongDifficultyAndVolumes(): Generator
    {
        yield [0,0];
        yield [12, 0];
        yield [0, 12];
        yield [-1, 12];
        yield [12, -1];
    }

    abstract public function getClass(): HalsteadEffortInterface;
}
