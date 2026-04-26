<?php

namespace UnitConverter;

use InvalidArgumentException;

/**
 * Class responsible for converting units.
 */
class UnitConverter
{
    /**
     * Conversion factors to meters.
     */
    private const LENGTH_UNITS = [
        'm'  => 1,
        'km' => 1000,
        'cm' => 0.01,
        'mm' => 0.001,
        'µm' => 1e-6,
        'nm' => 1e-9,
        'mi' => 1609.344,
        'yd' => 0.9144,
        'ft' => 0.3048,
        'in' => 0.0254,
    ];

    /**
     * Conversion factors to grams.
     */
    private const MASS_UNITS = [
        'kg' => 1000,
        'g'  => 1,
        'mg' => 0.001,
        't'  => 1000000,
        'lb' => 453.59237,
        'oz' => 28.3495231,
    ];

    /**
     * Conversion factors to liters.
     */
    private const VOLUME_UNITS = [
        'l'   => 1,
        'ml'  => 0.001,
        'gal' => 4.546,
        'cup' => 0.237,
        'oz'  => 0.028,
        'm³'  => 1000,
    ];

    /**
     * Conversion factors to square meters.
     */
    private const AREA_UNITS = [
        'm2'  => 1,
        'cm2' => 0.0001,
        'km2' => 1000000,
        'ha'  => 10000,
        'ac'  => 4046.8564224,
        'ft2' => 0.0929034116,
    ];

    /**
     * Supported temperature units.
     */
    private const TEMPERATURE_UNITS = ['C', 'F', 'K', 'R'];

    /**
     * Converts values between length units.
     *
     * @param float  $value         Numeric value to convert.
     * @param string $from          Source unit (e.g., 'm', 'km', 'cm').
     * @param string $to            Target unit (e.g., 'ft', 'in').
     * @param int    $decimalPlaces Number of decimal places in the result.
     *
     * @return float Converted value, rounded to given precision.
     */
    public function convertLength(
        float $value,
        string $from,
        string $to,
        int $decimalPlaces = 2
    ): float {
        return $this->convertByFactor($value, $from, $to, self::LENGTH_UNITS, $decimalPlaces);
    }

    /**
     * Converts values between mass units.
     *
     * @param float  $value         Numeric value to convert.
     * @param string $from          Source unit (e.g., 'g', 'kg', 'mg').
     * @param string $to            Target unit (e.g., 't', 'oz').
     * @param int    $decimalPlaces Number of decimal places in the result.
     *
     * @return float Converted value, rounded to given precision.
     */
    public function convertMass(
        float $value,
        string $from,
        string $to,
        int $decimalPlaces = 2
    ): float {
        return $this->convertByFactor($value, $from, $to, self::MASS_UNITS, $decimalPlaces);
    }

    /**
     * Converts values between volume units.
     *
     * @param float  $value         Numeric value to convert.
     * @param string $from          Source unit (e.g., 'l', 'ml', 'cup').
     * @param string $to            Target unit (e.g., 'gal', 'oz').
     * @param int    $decimalPlaces Number of decimal places in the result.
     *
     * @return float Converted value, rounded to given precision.
     */
    public function convertVolume(
        float $value,
        string $from,
        string $to,
        int $decimalPlaces = 2
    ): float {
        return $this->convertByFactor($value, $from, $to, self::VOLUME_UNITS, $decimalPlaces);
    }

    /**
     * Converts values between temperature units.
     *
     * @param float  $value         Numeric value to convert.
     * @param string $from          Source unit (e.g., 'C', 'F', 'K', 'R').
     * @param string $to            Target unit (e.g., 'C', 'F', 'K', 'R').
     * @param int    $decimalPlaces Number of decimal places in the result.
     *
     * @return float Converted value, rounded to given precision.
     */
    public function convertTemperature(
        float $value,
        string $from,
        string $to,
        int $decimalPlaces = 2
    ): float {
        $this->validateUnit($from, array_flip(self::TEMPERATURE_UNITS), 'Source');
        $this->validateUnit($to, array_flip(self::TEMPERATURE_UNITS), 'Destination');

        if ($from === $to) {
            return round($value, $decimalPlaces);
        }

        $celsius = $this->convertTemperatureToCelsius($value, $from);
        $result = $this->convertCelsiusToTemperature($celsius, $to);

        return round($result, $decimalPlaces);
    }

    /**
     * Converts values between area units.
     *
     * @param float  $value         Numeric value to convert.
     * @param string $from          Source unit (e.g., 'm2', 'cm2', 'km2').
     * @param string $to            Target unit (e.g., 'ha', 'ac', 'ft2').
     * @param int    $decimalPlaces Number of decimal places in the result.
     *
     * @return float Converted value, rounded to given precision.
     */
    public function convertArea(
        float $value,
        string $from,
        string $to,
        int $decimalPlaces = 2
    ): float {
        return $this->convertByFactor($value, $from, $to, self::AREA_UNITS, $decimalPlaces);
    }

    /**
     * Converts units that use a simple factor against a base unit.
     *
     * Example: length units use meters as the base unit.
     * First the value is converted to the base unit, then from the base unit to the target unit.
     *
     * @param array<string, float|int> $units
     */
    private function convertByFactor(
        float $value,
        string $from,
        string $to,
        array $units,
        int $decimalPlaces
    ): float {
        $this->validateUnit($from, $units, 'Source');
        $this->validateUnit($to, $units, 'Destination');

        if ($from === $to) {
            return round($value, $decimalPlaces);
        }

        $baseValue = $value * $units[$from];
        $result = $baseValue / $units[$to];

        return round($result, $decimalPlaces);
    }

    /**
     * Validates whether a unit exists in the supported unit list.
     *
     * @param array<string, mixed> $units
     */
    private function validateUnit(string $unit, array $units, string $type): void
    {
        if (!array_key_exists($unit, $units)) {
            throw new InvalidArgumentException("{$type} unit {$unit} is not supported");
        }
    }

    /**
     * Converts a temperature value to Celsius.
     */
    private function convertTemperatureToCelsius(float $value, string $from): float
    {
        switch ($from) {
            case 'C':
                return $value;
            case 'F':
                return ($value - 32) * (5 / 9);
            case 'K':
                return $value - 273.15;
            case 'R':
                return $value * 1.25;
            default:
                throw new InvalidArgumentException("Source unit {$from} is not supported");
        }
    }

    /**
     * Converts a Celsius value to another temperature unit.
     */
    private function convertCelsiusToTemperature(float $value, string $to): float
    {
        switch ($to) {
            case 'C':
                return $value;
            case 'F':
                return ($value * 1.8) + 32;
            case 'K':
                return $value + 273.15;
            case 'R':
                return $value * 0.8;
            default:
                throw new InvalidArgumentException("Destination unit {$to} is not supported");
        }
    }
}
