# paystack-api-client-php

[![Latest Stable Version](https://img.shields.io/github/v/release/brokeyourbike/paystack-api-client-php)](https://github.com/brokeyourbike/paystack-api-client-php/releases)
[![Total Downloads](https://poser.pugx.org/brokeyourbike/paystack-api-client-php/downloads)](https://packagist.org/packages/brokeyourbike/paystack-api-client-php)
[![License: MPL-2.0](https://img.shields.io/badge/license-MPL--2.0-purple.svg)](https://github.com/brokeyourbike/paystack-api-client-php/blob/main/LICENSE)

[![ci](https://github.com/brokeyourbike/paystack-api-client-php/actions/workflows/ci.yml/badge.svg)](https://github.com/brokeyourbike/paystack-api-client-php/actions/workflows/ci.yml)
[![codecov](https://codecov.io/gh/brokeyourbike/paystack-api-client-php/branch/main/graph/badge.svg?token=ImcgnxzGfc)](https://codecov.io/gh/brokeyourbike/paystack-api-client-php)
[![Type Coverage](https://shepherd.dev/github/brokeyourbike/paystack-api-client-php/coverage.svg)](https://shepherd.dev/github/brokeyourbike/paystack-api-client-php)

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
