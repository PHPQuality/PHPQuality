<?php

declare(strict_types=1);

namespace PHPQuality\Domain\Metric\General;

use function log;

/**
 * @psalm-external-mutation-free
 */
trait HalsteadVolume
{
    /** @var int */
    private $programLength = 0;
    /** @var int */
    private $programVocabulary = 0;

    final public function setLengthAndvocabulary(int $programLength, int $programVocabulary): void
    {
        $this->programLength     = $programLength;
        $this->programVocabulary = $programVocabulary;
    }

    final public function calculate(): float
    {
        return $this->programLength * log($this->programVocabulary, 2);
    }

    final public function name(): string
    {
        return 'Halstead Volume';
    }

    final public function description(): string
    {
        return 'Halstead volume is the volume of the program, calculated as follows: Program length * log2(Program vocabulary)';
    }

    final public function abbreviation(): string
    {
        return 'Volume';
    }
}
