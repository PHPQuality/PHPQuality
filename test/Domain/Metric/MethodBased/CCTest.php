<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\MethodBased;

use Generator;
use PHPQuality\Domain\Metric\MethodBased\CC;
use PHPUnit\Framework\TestCase;

final class CCTest extends TestCase
{
    /**
     * @dataProvider provideCounts
     */
    public function testItCalculatesTheCorrectComplexity(float $count): void
    {
        $cc = new CC('className', 'methodNAme');
        for ($i = 0; $i < $count; $i++) {
            $cc->increaseComplexity();
        }
        self::assertSame($count, $cc->calculate());
    }

    public function provideCounts(): Generator
    {
        yield [0];
        yield [120];
        yield [3];
    }
}
