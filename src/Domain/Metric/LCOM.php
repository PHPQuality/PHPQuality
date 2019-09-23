<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric;

use PHPQuality\Domain\Metric;
use function array_intersect;
use function count;
use function max;
use function sprintf;

final class LCOM implements Metric
{
    private const CALCULATION = <<<TXT
Consider a Class C1 with n methods M1, M2, ... Mn.
Let {Ij} - set of instance variables used by method Mi.
There are n such sets {I1}, ... {In}.
Let P = {(Ii, Ij) |Ii ∩ Ij = 0}
Let Q = {(Ii,Ij) | Ii ∩ Ij != 0}
If all n sets {Ii}, ... {In} are NULL then let P = 0;

LCOM = |P| - |Q| if |P| > |Q|
     = 0 otherwise

LCOM is the number of null intersections - number of nonempty intersections.
TXT;

    /** @var string */
    private $className;

    /** @var array<array<string>> */
    private $methods = [];

    public function __construct(string $className)
    {
        $this->className = $className;
    }

    public function calculate(): int
    {
        // P in calculation
        $nullIntersections = 0;
        // Q in calculation
        $nonEmptyIntersections = 0;

        $methodLength = count($this->methods);
        for ($i = 0; $i < $methodLength - 1; $i++) {
            for ($j = $i + 1; $j < $methodLength; $j++) {
                if (count(array_intersect($this->methods[$i], $this->methods[$j])) === 0) {
                    $nullIntersections++;
                    continue;
                }
                $nonEmptyIntersections++;
            }
        }

        return max($nullIntersections - $nonEmptyIntersections, 0);
    }

    public function className(): string
    {
        return $this->className;
    }

    /**
     * @param array<string> $properties
     */
    public function addMethod(array $properties): void
    {
        $this->methods[] = $properties;
    }

    public function name(): string
    {
        return 'Lack of cohesion in Methods';
    }

    public function description(): string
    {
        return sprintf(
            'Determines the cohesion between methods. Calculated as follows:%s%s',
            "\n",
            self::CALCULATION
        );
    }

    public function abbreviation(): string
    {
        return 'LCOM';
    }
}
