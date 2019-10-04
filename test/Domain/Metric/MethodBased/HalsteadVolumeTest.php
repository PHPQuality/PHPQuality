<?php

declare(strict_types=1);

namespace PHPQuality\Test\Domain\Metric\MethodBased;

use PHPQuality\Domain\Metric\ClassBased\HalsteadVolume;
use PHPQuality\Domain\Metric\General\Contracts\HalsteadVolumeInterface;
use PHPQuality\Test\Domain\Metric\General\HalsteadVolumeTestCase;

final class HalsteadVolumeTest extends HalsteadVolumeTestCase
{
    public function getClass(): HalsteadVolumeInterface
    {
        return new HalsteadVolume('foo');
    }
}
