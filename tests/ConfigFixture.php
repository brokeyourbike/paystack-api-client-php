<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\Paystack\Tests;

use BrokeYourBike\Paystack\ConfigInterface;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class ConfigFixture implements ConfigInterface
{
    public function getUrl(): string
    {
        return 'https://example.com';
    }

    public function getPublicKey(): string
    {
        return 'public-key';
    }

    public function getSecretKey(): string
    {
        return 'secret-key';
    }
}
