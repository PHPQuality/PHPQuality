<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\MethodBased;

use PHPQuality\Domain\Metric\General\Contracts\HalsteadTimeInterface;
use PHPQuality\Domain\Metric\MethodBased\HalsteadTime;
use PHPQuality\Test\Domain\Metric\General\HalsteadTimeTestCase;

final class HalsteadTimeTest extends HalsteadTimeTestCase
{
    public function getClass(): HalsteadTimeInterface
    {
        return new HalsteadTime('foo', 'bar');
    }
}
