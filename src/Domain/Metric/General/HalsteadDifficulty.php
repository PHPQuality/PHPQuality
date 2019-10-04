<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\General;

use PHPQuality\Domain\Metric\Exception\UnableToCalculate;
use Webmozart\Assert\Assert;

/**
 * @psalm-external-mutation-free
 */
trait HalsteadDifficulty
{
    /** @var int|null */
    private $distinctOperators;
    /** @var int|null */
    private $distinctOperands;
    /** @var int|null */
    private $totalOperands;

    final public function setData(int $distinctOperators, int $distinctOperands, int $totalOperands): void
    {
        Assert::allGreaterThan([$distinctOperators, $distinctOperands, $totalOperands], 0);
        $this->distinctOperators = $distinctOperators;
        $this->distinctOperands  = $distinctOperands;
        $this->totalOperands     = $totalOperands;
    }

    final public function calculate(): float
    {
        if ($this->distinctOperators === null || $this->distinctOperands === null || $this->totalOperands === null) {
            throw UnableToCalculate::missingData('distinctOperators', 'distinctOperands', 'totalOperands');
        }

        return ($this->distinctOperators / 2) * ($this->totalOperands / $this->distinctOperands);
    }

    final public function name(): string
    {
        return 'Halstead Difficulty';
    }

    final public function description(): string
    {
        return 'Halstead Difficutly described the difficulty of the program, or how hard it would be to do a code review' .
            'Calculated as follows: (Distinct Operators / 2) * (Total Operands / Distinct Operands)';
    }

    final public function abbreviation(): string
    {
        return 'Difficulty';
    }
}
