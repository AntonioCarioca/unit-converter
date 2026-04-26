<?php

namespace UnitConverter\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use UnitConverter\UnitConverter;

class UnitConverterTest extends TestCase
{
    private UnitConverter $converter;

    protected function setUp(): void
    {
        $this->converter = new UnitConverter();
    }

    public function testConvertsLength(): void
    {
        $this->assertSame(1000.0, $this->converter->convertLength(1, 'km', 'm'));
        $this->assertSame(1.0, $this->converter->convertLength(100, 'cm', 'm'));
    }

    public function testConvertsMass(): void
    {
        $this->assertSame(1.0, $this->converter->convertMass(1000, 'g', 'kg'));
        $this->assertSame(1000.0, $this->converter->convertMass(1, 'kg', 'g'));
    }

    public function testConvertsVolume(): void
    {
        $this->assertSame(1000.0, $this->converter->convertVolume(1, 'm³', 'l'));
        $this->assertSame(1.0, $this->converter->convertVolume(1000, 'l', 'm³'));
    }

    public function testConvertsArea(): void
    {
        $this->assertSame(10000.0, $this->converter->convertArea(1, 'm2', 'cm2'));
        $this->assertSame(1.0, $this->converter->convertArea(10000, 'cm2', 'm2'));
    }

    public function testConvertsTemperature(): void
    {
        $this->assertSame(32.0, $this->converter->convertTemperature(0, 'C', 'F'));
        $this->assertSame(100.0, $this->converter->convertTemperature(212, 'F', 'C'));
        $this->assertSame(273.15, $this->converter->convertTemperature(0, 'C', 'K'));
    }

    public function testReturnsSameTemperatureWhenUnitsAreEqual(): void
    {
        $this->assertSame(10.0, $this->converter->convertTemperature(10, 'C', 'C'));
        $this->assertSame(98.6, $this->converter->convertTemperature(98.6, 'F', 'F'));
    }

    public function testThrowsExceptionForInvalidSourceUnit(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Source unit invalid is not supported');

        $this->converter->convertLength(1, 'invalid', 'm');
    }

    public function testThrowsExceptionForInvalidDestinationUnit(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Destination unit invalid is not supported');

        $this->converter->convertMass(1, 'kg', 'invalid');
    }

    public function testRoundsResultUsingDecimalPlaces(): void
    {
        $this->assertSame(3.281, $this->converter->convertLength(1, 'm', 'ft', 3));
    }
}
