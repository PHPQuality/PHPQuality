<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\ClassBased;

use PHPQuality\Domain\Metric\ClassBased\HalsteadTime;
use PHPQuality\Domain\Metric\General\Contracts\HalsteadTimeInterface;
use PHPQuality\Test\Domain\Metric\General\HalsteadTimeTestCase;

final class HalsteadTimeTest extends HalsteadTimeTestCase
{
    public function getClass(): HalsteadTimeInterface
    {
        return new HalsteadTime('foo');
    }
}
