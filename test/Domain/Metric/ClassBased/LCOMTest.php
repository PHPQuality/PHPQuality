<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\ClassBased;

use Generator;
use PHPQuality\Domain\Metric\ClassBased\LCOM;
use PHPUnit\Framework\TestCase;

final class LCOMTest extends TestCase
{
    /**
     * @param array<array<string>> $propertiesInMethod
     *
     * @dataProvider providesLCOMCalculationCases
     */
    public function testItCalculatesCorrectly(array $propertiesInMethod, int $expected): void
    {
        $lcom = new LCOM('foo');
        foreach ($propertiesInMethod as $properties) {
            $lcom->addMethod($properties);
        }
        static::assertSame($expected, $lcom->calculate());
    }

    public function providesLCOMCalculationCases(): Generator
    {
        yield 'From original paper, 2 null intersections and 1 non empty intersection' => [
            [
                'm1' => ['a', 'b', 'c', 'd', 'e'],
                'm2' => ['a', 'b', 'e'],
                'm3' => ['x', 'y', 'z'],
            ],
            1,
        ];

        yield '4 null intersections and 2 nonempty intersections' => [
            [
                'm1' => ['a', 'b', 'c'],
                'm2' => ['b', 'd', 'e'],
                'm3' => ['d', 'e', 'g'],
                'm4' => ['x'],
            ],
            2,
        ];

        yield '0 null intersections and 6 nonempty intersections' => [
            [
                'm1' => ['a', 'b', 'c'],
                'm2' => ['b', 'd', 'e'],
                'm3' => ['d', 'e', 'a'],
                'm4' => ['b', 'e'],
            ],
            0,
        ];
    }

    public function testItCanDisplayItsClass(): void
    {
        $class = self::class;

        $lcom = new LCOM($class);

        static::assertSame($class, $lcom->className());
    }
}
