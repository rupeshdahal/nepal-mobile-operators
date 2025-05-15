# Nepal Mobile Operators

A Laravel package to identify mobile operators in Nepal based on number prefixes.

## Installation

You can install the package via composer:

```bash
composer require rupeshdahal/nepal-mobile-operators
```

The package will automatically register its service provider.

You can publish the configuration file with:

```bash
php artisan vendor:publish --provider="RupeshDai\NepalMobileOperators\NepalMobileOperatorsServiceProvider" --tag="config"
```

## Usage

### Basic Usage

```php
use RupeshDai\nepalimobileoperator\src\Facades\NepalMobileOperators;

// Get the operator name
$operator = NepalMobileOperators::getOperator('9841234567'); 
// Returns: "Ntc (Namaste SIM)"

// Check if a number is valid
$isValid = NepalMobileOperators::isValid('9841234567');
// Returns: true

// Get detailed information
$details = NepalMobileOperators::getOperatorDetails('9841234567');
// Returns: [
//    'operator' => 'Ntc (Namaste SIM)',
//    'prefixes' => ['984', '985', '986', '976'],
//    'technology' => 'GSM'
// ]
```

### Direct Class Usage

If you prefer not to use the facade, you can also use the class directly:

```php
use Neputer\NepalOperatorIdentifier\NepalMobileOperators;

$detector = new NepalMobileOperators();
$operator = $detector->getOperator('9841234567');
```

### Available Operators

The package currently supports the following operators:

| Operator | Prefixes | Technology |
|----------|----------|------------|
| Ntc (Namaste SIM) | 984, 985, 986, 976 | GSM |
| Ntc (Earlier CDMA, now with GSM) | 974, 975 | CDMA/GSM |
| Ncell | 980, 981, 982, 970 | GSM |
| Smart Cell | 961, 962, 988 | GSM |
| UTL | 972 | CDMA |
| Hello Mobile | 963 | GSM |

### Number Format Handling

The package handles various phone number formats:

- Standard 10-digit numbers: `9841234567`
- Numbers with country code: `+9779841234567` or `9779841234567`
- Numbers with leading zero: `09841234567`
- Formatted numbers: `984-123-4567` or `984 123 4567`

### Custom Configuration

After publishing the config file, you can add custom operators or modify validation settings:

```php
// config/nepalmobileoperators.php

return [
    'custom_operators' => [
        'New Operator' => [
            'prefixes' => ['990'],
            'technology' => 'GSM'
        ],
    ],
    
    'validation' => [
        'strict_length' => true,
    ],
];
```

## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
