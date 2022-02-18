# Laravel ING iDeal advanced

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pieterf/laravel-ing-ideal-advanced.svg?style=flat-square)](https://packagist.org/packages/pieterf/laravel-ing-ideal-advanced)

## Installation

You can install the package via composer:

```bash
composer require pieterf/laravel-ing-ideal-advanced
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-ing-ideal-advanced-config"
```

## Usage

### Issuers
```php
$issuers = LaravelIngIdealAdvanced::getIssuers();

foreach ($issuers->getCountries() as $country) {
    foreach ($country->getIssuers() as $issuer) {
        $issuer->getName();
    }
}
```

### Start Transaction
```php
$transaction = LaravelIngIdealAdvanced::startTransaction(
    $issuerId,
    new Transaction(1.22, $description, $entranceCode, 60, $purchaseID),
    route('call-back')
);

$transaction->getTransactionID()
```

### Get Transaction
```php
$transaction = LaravelIngIdealAdvanced::getTransaction($transactionID);

$transaction->getStatus()
$transaction->getConsumerIBAN()
```

## Credits

- [Pieter Floor](https://github.com/pieterf)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
