<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\ClassBased;

use PHPQuality\Domain\Metric\General\Contracts\HalsteadBugsInterface;
use PHPQuality\Domain\Metric\General\HalsteadBugs as BugTrait;

/**
 * @psalm-external-mutation-free
 */
final class HalsteadBugs extends ClassBasedMetric implements HalsteadBugsInterface
{
    use BugTrait;
}
