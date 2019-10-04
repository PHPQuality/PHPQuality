<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\General\Contracts;

interface HalsteadVolumeInterface
{
    public function setLengthAndvocabulary(int $programLength, int $programVocabulary): void;

    public function calculate(): float;
}
