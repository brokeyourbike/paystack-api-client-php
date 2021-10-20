<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\Paystack\Tests;

use Psr\Http\Message\UriInterface;
use Psr\Http\Message\ResponseInterface;
use PHPUnit\Framework\TestCase;
use BrokeYourBike\Paystack\ConfigInterface;
use BrokeYourBike\Paystack\Client;

class ResolveAccountNumberTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_prepare_request(): void
    {
        $secretKey = 'super-secure-secret-key';

        $mockedConfig = $this->getMockBuilder(ConfigInterface::class)->getMock();
        $mockedConfig->method('getUrl')->willReturn('https://api.example/');
        $mockedConfig->method('getSecretKey')->willReturn($secretKey);

        $mockedResponse = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $mockedResponse->method('getStatusCode')->willReturn(200);
        $mockedResponse->method('getBody')
            ->willReturn('{
                "status": true,
                "message": "Account number resolved",
                "data": {
                    "account_number": "123456789",
                    "account_name": "JOHN DOE",
                    "bank_id": 9
                }
            }');

        /** @var \Mockery\MockInterface $mockedClient */
        $mockedClient = \Mockery::mock(\GuzzleHttp\Client::class);
        $mockedClient->shouldReceive('request')->withArgs([
            'GET',
            'https://api.example/bank/resolve',
            [
                \GuzzleHttp\RequestOptions::HTTP_ERRORS => false,
                \GuzzleHttp\RequestOptions::HEADERS => [
                    'Accept' => 'application/json',
                    'Authorization' => "Bearer {$secretKey}",
                ],
                \GuzzleHttp\RequestOptions::QUERY => [
                    'account_number' => '123456789',
                    'bank_code' => '111',
                ],
            ],
        ])->once()->andReturn($mockedResponse);

        /**
         * @var ConfigInterface $mockedConfig
         * @var \GuzzleHttp\Client $mockedClient
         * */
        $api = new Client($mockedConfig, $mockedClient);
        $requestResult = $api->resolveAccountNumberRaw('111', '123456789');

        $this->assertInstanceOf(ResponseInterface::class, $requestResult);
        $this->assertSame(200, $requestResult->getStatusCode());
    }
}
