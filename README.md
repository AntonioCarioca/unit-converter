# 📏 UnitConverter

**UnitConverter** is a simple and robust PHP library for converting units of measurement. It supports conversions between lengths, masses, volumes, temperatures and areas. Useful in scientific and educational applications, or any project that requires the manipulation of units.

![Static Badge](https://img.shields.io/badge/XxZeroxX-FFEF00?style=for-the-badge&label=Author&labelColor=485460)
![Packagist Version](https://img.shields.io/packagist/v/xxzeroxx/unit-converter?server=https%3A%2F%2Fpackagist.org&style=for-the-badge&logo=packagist&logoColor=white&labelColor=485460&color=484C89)
![GitHub Release](https://img.shields.io/github/v/release/AntonioCarioca/unit-converter?style=for-the-badge&label=RELEASE&labelColor=485460&color=484C89)
![GitHub repo size](https://img.shields.io/github/repo-size/AntonioCarioca/unit-converter?style=for-the-badge&labelColor=485460&color=484C89)
![GitHub License](https://img.shields.io/github/license/AntonioCarioca/unit-converter?style=for-the-badge&labelColor=485460&color=484C89)

## 👤 Author

Desenvolvido por [Antonio Silva](https://antoniosilva.hashnode.dev/).

Contact us: antoniomarcos.silva@protonmail.com

## 📦 Installation

Use the [Composer](https://getcomposer.org):

```composer
composer require xxzeroxx/unit-converter
```

Or simply include the UnitConverter.php file in your project if you're not using Composer.

## 🚀 How to use

```php
require vendor/autoload.php;

use UnitConverter\UnitConverter;

$converter = new UnitConverter();

// Length
echo $converter->convertLength(100, 'cm', 'm'); // 1.00
```

You can also pass the number of decimal places as the fourth argument:

```php
echo $converter->convertLength(1234.567, 'm', 'km', 4); // 1.2346
```

## 📚 Available Methods

### `convertLength`

Converts values between length units.

Signature:

```php
public function convertLength(float $value, string $from, string $to, int $decimalPlaces = 2): float
```

Parameters:

- `value` - Numeric value to be converted.
- `from` - Source unit.
- `to` - Destination unit.
- `decimalPlaces` - Decimal precision of the result (default: 2).

Supported units:

- Meter (m)
- Kilometer (km)
- Centimeter (cm)
- Millimeter (mm)
- Micrometer (µm)
- Nanometer (nm)
- Mile (mi)
- Yard (yd)
- Foot (ft)
- Inch (in)

Example:

```php
echo $converter->convertLength(value: 5, from: 'km', to: 'm'); // 5000.00
```

### `convertMass`

Converts values between mass units.

Signature:

```php
public function convertMass(float $value, string $from, string $to, int $decimalPlaces = 2): float
```

Parameters:

- `value` - Numeric value to be converted.
- `from` - Source unit.
- `to` - Destination unit.
- `decimalPlaces` - Decimal precision of the result (default: 2).

Supported units:

- Kilogram (kg)
- Gram (g)
- Milligram (mg)
- Ton (t)
- Pound (lb)
- Ounce (oz)

Example:

```php
$converter->convertMass(value: 2, from: 'kg', to: 'lb'); // 4.41
```

### `convertVolume`

Converts values between volume units.

Signature:

```php
public function convertVolume(float $value, string $from, string $to, int $decimalPlaces = 2): float
```

Parameters:

- `value` - Numeric value to be converted.
- `from` - Source unit.
- `to` - Destination unit.
- `decimalPlaces` - Decimal precision of the result (default: 2).

Supported units:

- Liter (L)
- Milliliter (mL)
- Gallon (gal)
- Cup (cup)
- Liquid ounce (fl oz)
- Cubic meter (m³)

Example:

```php
$converter->convertVolume(value: 1, from: 'l', to: 'ml'); // 1000.00
```

### `convertTemperature`

Converts values between temperature units.

Signature:

```php
public function convertTemperature(float $value, string $from, string $to, int $decimalPlaces = 2): float
```

Parameters:

- `value` - Numeric value to be converted.
- `from` - Source unit.
- `to` - Destination unit.
- `decimalPlaces` - Decimal precision of the result (default: 2).

Supported units:

- Celsius (°C)
- Fahrenheit (°F)
- Kelvin (K)
- Réaumur (R)

Example:

```php
$converter->convertTemperature(value: 0, from: 'C', to: 'F'); // 32.00
```

### `convertArea`

Converts values between area units.

Signature:

```php
public function convertArea(float $value, string $from, string $to, int $decimalPlaces = 2): float
```

Parameters:

- `value` - Numeric value to be converted.
- `from` - Source unit.
- `to` - Destination unit.
- `decimalPlaces` - Decimal precision of the result (default: 2).

Supported units:

- Square meter (m²)
- Square centimeter (cm²)
- Square kilometer (km²)
- Hectare (ha)
- Acre (ac)
- Square foot (ft²)

Example:

```php
$converter->convertArea(value: 1, from: 'm2', to: 'ft2'); // 10.76
```

## ⚠️ Error handling

All methods throw `InvalidArgumentException` if:

- The value provided is not numeric;
- The source or destination unit is not supported.

```php
try {
    echo $converter->convertMass(value: 'abc', from: 'g', to: 'kg');
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage(); // "The value provided is not numerical."
}
```

## 📝 Licese

Distributed under the MIT License. See the [LICENSE](https://github.com/AntonioCarioca/unit-converter?tab=MIT-1-ov-file) file for more information.

© 2025 [Antonio Silva](https://antoniosilva.hashnode.dev/) – Todos os direitos reservados.
