# Changelog

All notable changes to this project will be documented in this file.

The format is based on Keep a Changelog:
https://keepachangelog.com/en/1.0.0/

And this project adheres to Semantic Versioning:
https://semver.org/

---

## [2.0.0] - 2026-04-26

This release introduces important fixes, internal improvements, and officially updates the package to require PHP 8.0 or higher.

## ⚠️ Breaking Change

- Dropped support for PHP 7.x
- Minimum required PHP version is now PHP 8.0

If your project still uses PHP 7.x, continue using the previous 1.x releases.

### Fixed
- Fixed temperature conversion when the source and target units are the same.
  - Example: `C` to `C` now correctly returns the original value.
- Fixed cubic meter conversion.
  - `1 m³` now correctly equals `1000 l`.

### Added
- Added PHPUnit tests
- Added automated test script via Composer:

```bash
composer test
```
### Changed
- Refactored internal code to reduce repetition.
- Added reusable private methods for unit validation and factor-based conversion.
- Improved project structure for better maintainability.

### Upgrade

Update using Composer:

```bash
composer update phpfiletool/unit-converter
```

Or require the new major version:

```bash
composer require phpfiletool/unit-converter:^2.0
```

---

## [1.0.1] - 2025-05-15

### Fixed
- Maintenance release.

---

## [1.0.0] - 2025-05-15

### Added
- Initial release.
- Length conversion.
- Mass conversion.
- Volume conversion.
- Temperature conversion.
- Area conversion.