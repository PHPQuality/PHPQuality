<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\MethodBased;

use PHPQuality\Domain\Metric\General\Contracts\HalsteadBugsInterface;
use PHPQuality\Domain\Metric\General\HalsteadBugs as BugTrait;

/**
 * @psalm-external-mutation-free
 */
final class HalsteadBugs extends MethodBasedMetric implements HalsteadBugsInterface
{
    use BugTrait;
}
