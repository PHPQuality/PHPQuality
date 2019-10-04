<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\General;

use Generator;
use InvalidArgumentException;
use PHPQuality\Domain\Metric\General\Contracts\HalsteadTimeInterface;
use PHPStan\Testing\TestCase;
use function round;

abstract class HalsteadTimeTestCase extends TestCase
{
    /**
     * @dataProvider provideEffort
     */
    final public function testItCalculatesCorrectly(float $effort, float $timeIndicator): void
    {
        $time = $this->getClass();
        $time->setEffort($effort);
        self::assertSame($timeIndicator, round($time->calculate(), 2));
    }

    final public function provideEffort(): Generator
    {
        yield [18, 1];
        yield [180, 10];
        yield [12, 0.67];
        yield [1, 0.06];
    }

    /**
     * @dataProvider provideInvalidEfforts
     */
    final public function testItErrosWhenProvidedWithInvalidEffort(float $effort): void
    {
        $t = $this->getClass();
        $this->expectException(InvalidArgumentException::class);
        $t->setEffort($effort);
    }

    final public function provideInvalidEfforts(): Generator
    {
        yield [0];
        yield [-1];
        yield [-12];
    }

    abstract public function getClass(): HalsteadTimeInterface;
}
