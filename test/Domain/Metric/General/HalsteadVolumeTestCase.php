<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\General;

use Generator;
use PHPQuality\Domain\Metric\General\Contracts\HalsteadVolumeInterface;
use PHPStan\Testing\TestCase;
use function round;

abstract class HalsteadVolumeTestCase extends TestCase
{
    /**
     * @dataProvider provideDataAndDifficulty
     */
    final public function testItCalculatesCorrectly(int $length, int $vocab, float $volumeIndicator): void
    {
        $volume = $this->getClass();
        $volume->setLengthAndvocabulary($length, $vocab);
        self::assertSame($volumeIndicator, round($volume->calculate(), 2));
    }

    final public function provideDataAndDifficulty(): Generator
    {
        yield [12, 8, 36];
        yield [340, 13, 1258.15];
    }

    abstract public function getClass(): HalsteadVolumeInterface;
}
