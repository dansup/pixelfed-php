# Pixelfed PHP SDK

WIP. Use at your own risk.

## Installation

Install with [Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos)

```bash
composer require dansup/pixelfed-php
```

## Authentication
To use this library, you must first obtain a Personal Access Token. Not all instances support this type of authorization yet.

## Examples
### Nodeinfo
```bash
php -f examples/nodeinfo.php
```


## Methods

### nodeinfo()
> GET /api/nodeinfo/2.0.json

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$api = new PixelfedApi($domain);
$nodeinfo = $api->nodeinfo();
```

### user()
> GET /api/v1/accounts/verify_credentials

**AUTHENTICATION REQUIRED**

```php
use \Pixelfed\PixelfedApi;

$domain = 'https://pixelfed.social';
$token = 'personal-access-token-here';
$api = new PixelfedApi($domain, $token);
$user = $api->user();
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Daniel Supernault](https://github.com/dansup)
- [All Contributors](../../contributors)