<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\Exception;

use LogicException;
use function implode;
use function sprintf;

final class UnableToCalculate extends LogicException
{
    public static function missingData(string ...$data): self
    {
        return new self(sprintf('Missing data: %s', implode(',', $data)));
    }
}
