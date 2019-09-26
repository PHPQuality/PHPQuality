<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\ClassBased;

use Generator;
use PHPQuality\Domain\Metric;
use PHPQuality\Domain\Metric\ClassBased\WMC;
use PHPQuality\Test\Fixtures\Metric\FakeMethodMetric;
use PHPUnit\Framework\TestCase;

final class WMCTest extends TestCase
{
    /**
     * @param array<Metric> $methodMetrics
     *
     * @dataProvider provideMethodsAndComplexity
     */
    public function testItCalculatesCorrectWMC(array $methodMetrics, int $complexity): void
    {
        $wmc = new WMC('className');

        foreach ($methodMetrics as $methodMetric) {
            $wmc->addMethod($methodMetric);
        }
        self::assertSame($complexity, $wmc->calculate());
    }

    public function provideMethodsAndComplexity(): Generator
    {
        yield 'no methods' =>[
            [],
            0,
        ];

        yield 'one method' => [
            [new FakeMethodMetric(3)],
            3,
        ];

        yield 'multiple methods' => [
            [
                new FakeMethodMetric(3),
                new FakeMethodMetric(23),
                new FakeMethodMetric(18),
            ],
            44,
        ];
    }
}
