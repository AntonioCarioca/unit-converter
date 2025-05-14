<?php

namespace UnitConverter;

use InvalidArgumentException;

/**
 * Class responsible for converting length units.
 */
class UnitConverter
{
	/**
	 * Constructor.
	 * Currently does not perform any initialization.
	 */
	function __construct()
	{
		// No initialization needed at this time
	}

	/**
	 * Converts values between length units.
	 * @param  float  $value         Numeric value to convert.
	 * @param  string $from          Source unit (e.g., 'm', 'km', 'cm').
	 * @param  string $to            Target unit (e.g., 'ft', 'in').
	 * @param  int    $decimalPlaces Number of decimal places in the result.
	 * @return float                 Converted value, rounded to given precision.
	 *
	 * @throws InvalidArgumentException If the value is not numeric or if units are not supported.
	 */
	public function convertLength(
		float $value,
		string $from,
		string $to,
		int $decimalPlaces = 2
	): float
	{
		// Conversion factors to meters
		$units = [
			'm' => 1,         // base
        	'km' => 1000,     // 1 km = 1000 m
        	'cm' => 0.01,     // 1 cm = 0.01 m
        	'mm' => 0.001,    // 1 mm = 0.001 m
        	'µm' => 1e-6,     // 1 µm = 1e-6 m 
        	'nm' => 1e-9,     // 1 nm = 1e-9 m 
        	'mi' => 1609.344, // 1 mi = 1609.344 m 
        	'yd' => 0.9144,   // 1 yd = 0.9144 m 
        	'ft' => 0.3048,   // 1 ft = 0.3048 m
        	'in' => 0.0254,   // 1 in = 0.0254 m 
		];

		// Validate that the value is numeric
		if (!is_numeric($value)) {
			throw new InvalidArgumentException("The value provided is not numerical.");
		}

		// Validate the source unit
		if (!isset($units[$from])) {
			throw new InvalidArgumentException("Source unit {$from} is not supported");
		}
		
		// Validate the target unit	
		if (!isset($units[$to])) {
			throw new InvalidArgumentException("Destination unit {$to} is not supported");
		}

		// Convert to meters
		$toMeters = $value * $units[$from];
		// Convert from meters to the target unit
		$result = $toMeters / $units[$to];
		// Return the rounded result
		return round($result, $decimalPlaces);
	}

	/**
	 * Converts values between mass units.
	 * @param  float  $value         Numeric value to convert.
	 * @param  string $from          Source unit (e.g., 'g', 'kg', 'mg').
	 * @param  string $to            Target unit (e.g., 't', 'oz').
	 * @param  int    $decimalPlaces Number of decimal places in the result.
	 * @return float                 Converted value, rounded to given precision.
	 *
	 * @throws InvalidArgumentException If the value is not numeric or if units are not supported.
	 */
	public function convertMass(
		float $value,
		string $from,
		string $to,
		int $decimalPlaces = 2
	): float
	{
		// Conversion factors to grams
		$units = [
			'kg' => 1000,          // 1 kg = 1000 g
        	'g'  => 1,             // base
        	'mg' => 0.001,         // 1 mg = 0.001 g
        	't'  => 1000000,       // 1 t = 1.000.000 g
        	'lb' => 453.59237,     // 1 lb = 453.59237 g
        	'oz' => 28.3495231,    // 1 oz = 28.3495231 g
		];

		// Validate that the value is numeric
		if (!is_numeric($value)) {
			throw new InvalidArgumentException("The value provided is not numerical.");
		}

		// Validate the source unit
		if (!isset($units[$from])) {
			throw new InvalidArgumentException("Source unit {$from} is not supported");
		}
		
		// Validate the target unit	
		if (!isset($units[$to])) {
			throw new InvalidArgumentException("Destination unit {$to} is not supported");
		}

		// Convert to grams
		$toGrams = $value * $units[$from];
		// Convert from grams to the target unit
		$result = $toGrams / $units[$to];
		// Return the rounded result
		return round($result, $decimalPlaces);
	}

	/**
	 * Converts values between volumes units.
	 * @param  float  $value         Numeric value to convert.
	 * @param  string $from          Source unit (e.g., 'l', 'ml', 'cup').
	 * @param  string $to            Target unit (e.g., 'gal', 'oz').
	 * @param  int    $decimalPlaces Number of decimal places in the result.
	 * @return float                 Converted value, rounded to given precision.
	 *
	 * @throws InvalidArgumentException If the value is not numeric or if units are not supported.
	 */
	public function convertVolume(
		float $value,
		string $from,
		string $to,
		int $decimalPlaces = 2
	): float
	{
		// Conversion factors to litre
		$units = [
			'l'   => 1,       // base
			'ml'  => 0.001,   // 1 ml = 0.001 l
			'gal' => 4.546,   // 1 gal = 4.546 l
			'cup' => 0.237,   // 1 cup = 0.237 l
			'oz'  => 0.028,   // 1 oz = 0.028 l
			'm³'  => 1.000    // 1 m³ = 1.000 l
		];

		// Validate that the value is numeric
		if (!is_numeric($value)) {
			throw new InvalidArgumentException("The value provided is not numerical.");
		}

		// Validate the source unit
		if (!isset($units[$from])) {
			throw new InvalidArgumentException("Source unit {$from} is not supported");
		}
		
		// Validate the target unit	
		if (!isset($units[$to])) {
			throw new InvalidArgumentException("Destination unit {$to} is not supported");
		}

		// Convert to liters
		$toLiters = $value * $units[$from];
		// Convert from liters to the target unit
		$result = $toLiters / $units[$to];
		// Return the rounded result
		return round($result, $decimalPlaces);
	}

	/**
	 * Converts values between Temperatures units.
	 * @param  float  $value         Numeric value to convert.
	 * @param  string $from          Source unit (e.g., 'C', 'F', 'K', 'R').
	 * @param  string $to            Target unit (e.g., 'C', 'F', 'K', 'R').
	 * @param  int    $decimalPlaces Number of decimal places in the result.
	 * @return float                 Converted value, rounded to given precision.
	 *
	 * @throws InvalidArgumentException If the value is not numeric or if units are not supported.
	 */
	public function convertTemperature(
		float $value,
		string $from,
		string $to,
		int $decimalPlaces = 2
	): float
	{
		// List of supported temperature units
		$units = ['C','F','K','R'];

		// Validate that the value is numeric
		if (!is_numeric($value)) {
			throw new InvalidArgumentException("The value provided is not numerical.");
		}

		// Validate the source unit
		if (!in_array($from, $units)) {
			throw new InvalidArgumentException("Source unit {$from} is not supported");
		}
		
		// Validate the target unit
		if (!in_array($to, $units)) {
			throw new InvalidArgumentException("Destination unit {$to} is not supported");
		}

		// Conversion logic for source unit Celsius (C)
		if ($from === 'C') {
			if ($to === 'F') {
				// Celsius to Fahrenheit
				$result = ($value * 1.8) + 32;
			} elseif ($to === 'K') {
				// Celsius to Kelvin
				$result = $value + 273.15;
			} else {
				// Celsius to Réaumur
				$result = $value * 0.8;
			}
		// Conversion logic for source unit Fahrenheit (F)
		} elseif ($from === 'F') {
			if ($to === 'C') {
				// Fahrenheit to Celsius
				$result = ($value - 32) * (5/9);
			} elseif ($to === 'K') {
				// Fahrenheit to Kelvin
				$result = ($value - 32) * (5/9) + 273.15;
			} else {
				// Fahrenheit to Réaumur
				$result = ($value - 32) * (4/9);
			}
		// Conversion logic for source unit Kelvin (K)
		} elseif ($from === 'K') {
			if ($to === 'C') {
				// Kelvin to Celsius
				$result = $value - 273.15;
			} elseif ($to === 'F') {
				// Kelvin to Fahrenheit
				$result = ($value - 273.15) * 1.8 + 32;
			} else {
				// Kelvin to Réaumur
				$result = ($value - 273.15) * 4/5;
			}
		// Conversion logic for source unit Réaumur (R)
		} else {
			if ($to === 'C') {
				// Réaumur to Celsius
				$result = $value * 1.25;
			} elseif ($to === 'F') {
				// Réaumur to Fahrenheit
				$result = ($value * 2.25) + 32;
			} else {
				// Réaumur to Kelvin
				$result = ($value * 1.25) + 273.15;
			}
		}

		// Return the result rounded to the specified number of decimal places
		return round($result, $decimalPlaces);
	}
}
