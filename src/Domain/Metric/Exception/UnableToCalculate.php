<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\Exception;

use LogicException;

final class UnableToCalculate extends LogicException
{
    public static function unknownEffort(): self
    {
        return new self('Unable to calulate metric, as effort has not been calculated');
    }

    public static function unknownDifficulty(): self
    {
        return new self('Unable to calulate metric, as difficulty has not been calculated');
    }

    public static function unknownVolume(): self
    {
        return new self('Unable to calulate metric, as volume has not been calculated');
    }

    public static function unkownOperands(): self
    {
        return new self('Unable to calulate metric, as number of operands has not been calculated');
    }
}
