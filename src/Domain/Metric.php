<?php

declare(strict_types=1);

namespace PHPQuality\Domain;

interface Metric
{
    public function calculate(): int;

    public function name(): string;

    public function description(): string;

    public function abbreviation(): string;
}
