# 📏 UnitConverter

**UnitConverter** is a simple and robust PHP library for converting units of measurement. It supports conversions between lengths, masses, volumes, temperatures and areas. Useful in scientific and educational applications, or any project that requires the manipulation of units.

![PHP Version](https://img.shields.io/badge/PHP-8.0%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Packagist Version](https://img.shields.io/packagist/v/xxzeroxx/unit-converter?server=https%3A%2F%2Fpackagist.org&style=for-the-badge&logo=packagist&logoColor=white)
![GitHub Release](https://img.shields.io/github/v/release/AntonioCarioca/unit-converter?style=for-the-badge&logo=github&logoColor=white)
![GitHub License](https://img.shields.io/github/license/AntonioCarioca/unit-converter?style=for-the-badge)
[![Tests](https://img.shields.io/github/actions/workflow/status/AntonioCarioca/unit-converter/tests.yml?branch=main&style=for-the-badge&label=Tests&labelColor=485460)](https://github.com/AntonioCarioca/unit-converter/actions/workflows/tests.yml)

## 🚀 Features

- Length conversion (mm, cm, m, km)
- Mass conversion (g, kg, t)
- Volume conversion (ml, l, m³)
- Temperature conversion (C, F, K)
- Area conversion (m², cm², km²)
- Simple and intuitive API
- Lightweight and dependency-free
- Fully tested with PHPUnit
- PHP 8+ support

---

## ⚠️ Breaking Changes (v2.0.0)

- Dropped support for PHP 7.x
- Minimum required PHP version is now **8.0**

---

## 📦 Installation

Install via Composer:

```bash
composer require phpfiletool/unit-converter
```

## 📖 Usage

```php
require 'vendor/autoload.php';

use UnitConverter\UnitConverter;

$converter = new UnitConverter();

// Length
echo $converter->convertLength(1, 'km', 'm'); // 1000

// Mass
echo $converter->convertMass(1000, 'g', 'kg'); // 1

// Volume
echo $converter->convertVolume(1, 'm³', 'l'); // 1000

// Temperature
echo $converter->convertTemperature(0, 'C', 'F'); // 32

// Area
echo $converter->convertArea(1, 'm²', 'cm²'); // 10000
```

## ❗ Error Handling

The library throws exceptions for invalid units:

```php
$converter->convertLength(10, 'invalid', 'm');
```

## 🧪 Running Tests

```bash
composer test
```

## 📜 Changelog

See [CHANGELOG.md](CHANGELOG.md) for version history.

## 🤝 Contributing

Contributions are welcome!

1. Fork the project
2. Create your feature branch
3. Commit your changes
4. Push to your branch
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License.