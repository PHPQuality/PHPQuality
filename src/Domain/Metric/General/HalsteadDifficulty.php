<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\General;

use PHPQuality\Domain\Metric\Exception\UnableToCalculate;

/**
 * @psalm-external-mutation-free
 */
trait HalsteadDifficulty
{
    /** @var int  */
    private $distinctOperators = 0;
    /** @var int  */
    private $distinctOperands = 0;
    /** @var int  */
    private $totalOperands = 0;

    final public function setData(int $distinctOperators, int $distinctOperands, int $totalOperands): void
    {
        $this->distinctOperators = $distinctOperators;
        $this->distinctOperands  = $distinctOperands;
        $this->totalOperands     = $totalOperands;
    }

    final public function calculate(): float
    {
        if ($this->distinctOperands === 0) {
            throw UnableToCalculate::unkownOperands();
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
