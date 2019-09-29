<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\ClassBased;

use PHPQuality\Domain\Metric\ClassBased\HalsteadBugs;
use PHPQuality\Domain\Metric\General\Contracts\HalsteadBugsInterface;
use PHPQuality\Test\Domain\Metric\General\HalsteadBugsTestCase;

final class HalsteadBugsTest extends HalsteadBugsTestCase
{
    public function getClass(): HalsteadBugsInterface
    {
        return new HalsteadBugs('foo');
    }
}
