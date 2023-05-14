# paystack-api-client

[![Latest Stable Version](https://img.shields.io/github/v/release/brokeyourbike/paystack-api-client-php)](https://github.com/brokeyourbike/paystack-api-client-php/releases)
[![Total Downloads](https://poser.pugx.org/brokeyourbike/paystack-api-client/downloads)](https://packagist.org/packages/brokeyourbike/paystack-api-client)
[![Maintainability](https://api.codeclimate.com/v1/badges/6d4d37fd39c2209fbe2b/maintainability)](https://codeclimate.com/github/brokeyourbike/paystack-api-client-php/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/6d4d37fd39c2209fbe2b/test_coverage)](https://codeclimate.com/github/brokeyourbike/paystack-api-client-php/test_coverage)

Paystack API Client for PHP

## Installation

```bash
composer require brokeyourbike/paystack-api-client
```

## Usage

```php
use BrokeYourBike\Paystack\Client;

$apiClient = new Client($config, $httpClient);
$result = $apiClient->resolveAccountNumberRaw($bankCode, $accountNumber);
```

## Authors
- [Ivan Stasiuk](https://github.com/brokeyourbike) | [Twitter](https://twitter.com/brokeyourbike) | [LinkedIn](https://www.linkedin.com/in/brokeyourbike) | [stasi.uk](https://stasi.uk)

## License
[Mozilla Public License v2.0](https://github.com/brokeyourbike/paystack-api-client-php/blob/main/LICENSE)
