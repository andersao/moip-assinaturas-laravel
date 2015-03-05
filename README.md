# Moip Assinaturas - Laravel 5

## Installation

In your terminal run **composer require prettus/moip-assinaturas-laravel.** This will grab the last release.

Or

Edit your composer.json like this:

```json
"require": {
    ....
    "prettus/moip-assinaturas-laravel": "dev-master"
}
```

Issue composer update

### Laravel 5

Add to config/app.php service provider array:

```php
    'Prettus\MoipLaravel\Subscription\SubscriptionServiceProvider',
```

Publish Configuration

```shell
php artisan vendor:publish --provider="Prettus\MoipLaravel\Subscription\SubscriptionServiceProvider"
```

### Laravel 4

Add to app/config/app.php service provider array:

```php
    'Prettus\MoipLaravel\Subscription\SubscriptionServiceProviderLaravel4',
```

Publish Configuration

```shell
php artisan config:publish prettus/moip-assinaturas-laravel
```

### Alias

```php
'MoipPlanos'        => 'Prettus\MoipLaravel\Subscription\Facades\MoipPlanos',
'MoipFaturas'       => 'Prettus\MoipLaravel\Subscription\Facades\MoipFaturas',
'MoipPagamentos'    => 'Prettus\MoipLaravel\Subscription\Facades\MoipPagamentos',
'MoipPreferencias'  => 'Prettus\MoipLaravel\Subscription\Facades\MoipPreferencias',
'MoipAssinaturas'   => 'Prettus\MoipLaravel\Subscription\Facades\MoipAssinaturas',
```

## Facades

Facades Available

- [MoipPlanos (Plans)](https://github.com/andersao/moip-assinaturas-php/wiki/planos)
- [MoipClientes (Customers)](https://github.com/andersao/moip-assinaturas-php/wiki/clientes)
- [MoipAssinaturas (Subscriptions)](https://github.com/andersao/moip-assinaturas-php/wiki/assinaturas)
- [MoipFaturas (Invoice)](https://github.com/andersao/moip-assinaturas-php/wiki/faturas)
- [MoipPagamentos (Payments)](https://github.com/andersao/moip-assinaturas-php/wiki/pagamentos)
- [MoipPreferencias (Preferences)](https://github.com/andersao/moip-assinaturas-php/wiki/prefer%C3%AAncias)

# Author

Anderson Andrade - <contato@andersonandra.de>