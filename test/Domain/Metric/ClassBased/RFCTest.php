<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\ClassBased;

use Generator;
use PHPQuality\Domain\Metric\ClassBased\RFC;
use PHPUnit\Framework\TestCase;

final class RFCTest extends TestCase
{
    /**
     * @param array<array<string>> $callsPerMethod
     *
     * @dataProvider provideRFCCases
     */
    public function testItCalculatesCorrectRFC(array $callsPerMethod, int $expectedRFC): void
    {
        $rfc = new RFC('class');
        foreach ($callsPerMethod as $method) {
            $rfc->addMethod($method);
        }

        self::assertSame($expectedRFC, $rfc->calculate());
    }

    public function provideRFCCases(): Generator
    {
        yield '1 method' => [
            [
                [
                    'Foo::bar',
                    'file_get_contents',
                    'Bar::baz',
                ],
            ],
            3,
        ];

        yield 'multiple methods, no overlap' => [
            [
                [
                    'Foo::bar',
                    'file_get_contents',
                    'Bar::baz',
                ],
                [
                    'Foo::baz',
                    'Bar::foo',
                    'file_put_contents',
                    'that_one_specific_function_call',
                ],
            ],
            7,
        ];

        yield 'multiple methods, with overlap' => [
            [
                [
                    'Foo::bar',
                    'file_get_contents',
                    'Bar::baz',
                ],
                [
                    'Foo::baz',
                    'Foo::bar',
                    'file_put_contents',
                    'that_one_specific_function_call',
                ],
            ],
            6,
        ];
    }
}
