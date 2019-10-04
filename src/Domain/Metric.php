<?php

declare(strict_types=1);

namespace PHPQuality\Domain;

/**
 * @psalm-external-mutation-free
 */
interface Metric
{
    /**
     * @psalm-mutation-free
     */
    public function calculate(): float;

    public function name(): string;

    public function description(): string;

    public function abbreviation(): string;
}
