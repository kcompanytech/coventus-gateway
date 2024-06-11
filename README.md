# Api gatway for coventus api

[![Latest Version on Packagist](https://img.shields.io/packagist/v/kcompanytech/coventus-gateway.svg?style=flat-square)](https://packagist.org/packages/kcompanytech/coventus-gateway)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/kcompanytech/coventus-gateway/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/kcompanytech/coventus-gateway/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/kcompanytech/coventus-gateway/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/kcompanytech/coventus-gateway/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/kcompanytech/coventus-gateway.svg?style=flat-square)](https://packagist.org/packages/kcompanytech/coventus-gateway)

Api Coventus gateway for Laravel

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/coventus-gateway.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/coventus-gateway)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

## Installation

You can install the package via composer:

```bash
composer require kcompanytech/coventus-gateway
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="coventus-gateway-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="coventus-gateway-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="coventus-gateway-views"
```

## Usage

```php

class ExampleController extends Controller
{
    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function showBookings()
    {
        $from = '2024-06-01'; // Example timestamp
        $to = '2024-06-07';   // Example timestamp
        $resource = ['19071','18294']; // Example resource array

        $bookings = $this->clientService->getBookingService()->getBookings($from, $to, $resource);
        
        return response()->json($bookings);
    }

    public function showCategories()
    {
        $categories = $this->clientService->getCategoryService()->getCategories();
        
        return response()->json($categories);
    }
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Andreas Kaae](https://github.com/kcompanytech)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
