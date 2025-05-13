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
			'm' => 1,
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
}
