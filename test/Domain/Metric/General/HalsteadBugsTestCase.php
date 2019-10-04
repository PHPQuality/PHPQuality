<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\General;

use Generator;
use InvalidArgumentException;
use PHPQuality\Domain\Metric\Exception\UnableToCalculate;
use PHPQuality\Domain\Metric\General\Contracts\HalsteadBugsInterface;
use PHPStan\Testing\TestCase;
use const INF;
use function round;

abstract class HalsteadBugsTestCase extends TestCase
{
    abstract public function getClass(): HalsteadBugsInterface;

    /**
     * @dataProvider provideEffortAndBugsCases
     */
    final public function testItCalculatesCorrectly(float $effort, float $bugCount): void
    {
        $bugs = $this->getClass();
        $bugs->setEffort($effort);
        self::assertSame($bugCount, round($bugs->calculate(), 6));
    }

    final public function provideEffortAndBugsCases(): Generator
    {
        yield [380, 0.017488];

        yield [345851, 1.642372];

        yield [12, 0.001747];

        yield [90, 0.006694];

        yield [1, 0.000333 ];
    }

    final public function testItThrowsWhenEffortNotSet(): void
    {
        $bugs = $this->getClass();
        $this->expectException(UnableToCalculate::class);
        $bugs->calculate();
    }

    /**
     * @dataProvider provideWrongEfforts
     */
    final public function testItErrorsWhenProvidedWithWrongEffort(float $effort): void
    {
        $bugs = $this->getClass();
        $this->expectException(InvalidArgumentException::class);

        $bugs->setEffort($effort);
    }

    final public function provideWrongEfforts(): Generator
    {
        yield [0];
        yield [-1];
        yield [-INF];
    }
}
