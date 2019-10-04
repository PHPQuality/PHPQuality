<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\ClassBased;

use PHPQuality\Domain\Metric\ClassBased\HalsteadEffort;
use PHPQuality\Domain\Metric\General\Contracts\HalsteadEffortInterface;
use PHPQuality\Test\Domain\Metric\General\HalsteadEffortTestCase;

final class HalsteadEffortTest extends HalsteadEffortTestCase
{
    public function getClass(): HalsteadEffortInterface
    {
        return new HalsteadEffort('foo');
    }
}
