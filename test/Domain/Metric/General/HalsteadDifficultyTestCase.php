<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\General;

use Generator;
use InvalidArgumentException;
use PHPQuality\Domain\Metric\Exception\UnableToCalculate;
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
        yield [4, 1, 7, 14.0];
    }

    final public function testThrowsWhenNoOperands(): void
    {
        $d = $this->getClass();
        $this->expectException(UnableToCalculate::class);
        $d->calculate();
    }

    /**
     * @dataProvider provideWrongInputData
     */
    final public function testItValidatesInputData(int $distinctOperators, int $distinctOperands, int $totalOperands): void
    {
        $d = $this->getClass();
        $this->expectException(InvalidArgumentException::class);
        $d->setData($distinctOperators, $distinctOperands, $totalOperands);
    }

    final public function provideWrongInputData(): Generator
    {
        yield [0,0,0];

        yield [1, 0 , 0];

        yield [1, 1, 0];

        yield [1, 0, 1];

        yield [0,0,1];

        yield [0, 1,1];

        yield [12, 18, -12000];

        yield [12, -30, -12000];
    }

    abstract public function getClass(): HalsteadDifficultyInterface;
}
