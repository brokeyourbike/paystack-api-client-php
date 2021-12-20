# paystack-api-client

[![Latest Stable Version](https://img.shields.io/github/v/release/brokeyourbike/paystack-api-client-php)](https://github.com/brokeyourbike/paystack-api-client-php/releases)
[![Total Downloads](https://poser.pugx.org/brokeyourbike/paystack-api-client/downloads)](https://packagist.org/packages/brokeyourbike/paystack-api-client)
[![License: MPL-2.0](https://img.shields.io/badge/license-MPL--2.0-purple.svg)](https://github.com/brokeyourbike/paystack-api-client-php/blob/main/LICENSE)

[![Maintainability](https://api.codeclimate.com/v1/badges/6d4d37fd39c2209fbe2b/maintainability)](https://codeclimate.com/github/brokeyourbike/paystack-api-client-php/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/6d4d37fd39c2209fbe2b/test_coverage)](https://codeclimate.com/github/brokeyourbike/paystack-api-client-php/test_coverage)
[![tests](https://github.com/brokeyourbike/paystack-api-client-php/actions/workflows/tests.yml/badge.svg)](https://github.com/brokeyourbike/paystack-api-client-php/actions/workflows/tests.yml)

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

## License
[Mozilla Public License v2.0](https://github.com/brokeyourbike/paystack-api-client-php/blob/main/LICENSE)
