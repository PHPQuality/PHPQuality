<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric;

use function array_merge;
use function array_unique;
use function count;
use function sprintf;

/**
 * @psalm-external-mutation-free
 */
final class RFC extends ClassBasedMetric
{
    private const CALCULATION = <<<TXT
RFC = |RS| where RS is the response set for the class.

RS = {M) ⋃all i {Ri} 
where {Ri} = set of methods called by method i and 
{M} = set of all methods in the class

The response set of a class is the set of methods that can potentially be executed in response to a message recieved by
an object of that class.
TXT;

    /** @var array<string> */
    private $methodCalls = [];

    /**
     * @param array<string> $calls Fully qualified method and function calls done by the processed method
     */
    public function addMethod(array $calls): void
    {
        $this->methodCalls = array_unique(array_merge($this->methodCalls, $calls));
    }

    public function calculate(): int
    {
        return count($this->methodCalls);
    }

    public function name(): string
    {
        return 'Response For Class';
    }

    public function description(): string
    {
        return sprintf(
            'Deterimines the response set for a class. Calculated as follows %s%s',
            "\n",
            self::CALCULATION
        );
    }

    public function abbreviation(): string
    {
        return 'RFC';
    }
}
