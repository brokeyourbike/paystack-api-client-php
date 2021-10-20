<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\Paystack;

use Psr\Http\Message\ResponseInterface;
use BrokeYourBike\ResolveUri\ResolveUriTrait;
use BrokeYourBike\Paystack\ConfigInterface;
use BrokeYourBike\HttpClient\HttpClientTrait;
use BrokeYourBike\HttpClient\HttpClientInterface;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
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

    public function resolveAccountNumberRaw(string $bankCode, string $accountNumber): ResponseInterface
    {
        $options = [
            \GuzzleHttp\RequestOptions::HTTP_ERRORS => false,
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
        return $this->httpClient->request('GET', $uri, $options);
    }
}
