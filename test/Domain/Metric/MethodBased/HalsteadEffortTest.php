<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\MethodBased;

use PHPQuality\Domain\Metric\General\Contracts\HalsteadEffortInterface;
use PHPQuality\Domain\Metric\MethodBased\HalsteadEffort;
use PHPQuality\Test\Domain\Metric\General\HalsteadEffortTestCase;

final class HalsteadEffortTest extends HalsteadEffortTestCase
{
    public function getClass(): HalsteadEffortInterface
    {
        return new HalsteadEffort('foo', 'bar');
    }
}
