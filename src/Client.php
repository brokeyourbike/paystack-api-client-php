<?php

// Copyright (C) 2021 Ivan Stasiuk <ivan@stasi.uk>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\Paystack;

use BrokeYourBike\ResolveUri\ResolveUriTrait;
use BrokeYourBike\Paystack\Models\ResolveAccountNumberResponse;
use BrokeYourBike\Paystack\Interfaces\ConfigInterface;
use BrokeYourBike\HttpClient\HttpClientTrait;
use BrokeYourBike\HttpClient\HttpClientInterface;

/**
 * @author Ivan Stasiuk <ivan@stasi.uk>
 */
class Client implements HttpClientInterface
{
    use HttpClientTrait;
    use ResolveUriTrait;

    private ConfigInterface $config;

    public function __construct(ConfigInterface $config, \GuzzleHttp\ClientInterface $httpClient)
    {
        $this->config = $config;
        $this->httpClient = $httpClient;
    }

    public function getConfig(): ConfigInterface
    {
        return $this->config;
    }

    public function resolveAccountNumberRaw(string $bankCode, string $accountNumber): ResolveAccountNumberResponse
    {
        $options = [
            \GuzzleHttp\RequestOptions::HEADERS => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->config->getSecretKey(),
            ],
            \GuzzleHttp\RequestOptions::QUERY => [
                'account_number' => $accountNumber,
                'bank_code' => $bankCode,
            ],
        ];

        $uri = (string) $this->resolveUriFor($this->config->getUrl(), 'bank/resolve');
        $response = $this->httpClient->request('GET', $uri, $options);

        return new ResolveAccountNumberResponse($response);
    }
}
