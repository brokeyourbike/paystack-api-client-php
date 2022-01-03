<?php

// Copyright (C) 2021 Ivan Stasiuk <brokeyourbike@gmail.com>.
//
// This Source Code Form is subject to the terms of the Mozilla Public
// License, v. 2.0. If a copy of the MPL was not distributed with this file,
// You can obtain one at https://mozilla.org/MPL/2.0/.

namespace BrokeYourBike\Paystack\Models;

use Spatie\DataTransferObject\Attributes\MapFrom;
use BrokeYourBike\DataTransferObject\JsonResponse;

/**
 * @author Ivan Stasiuk <brokeyourbike@gmail.com>
 */
class ResolveAccountNumberResponse extends JsonResponse
{
    public bool $status;
    public string $message;

    #[MapFrom('data.account_number')]
    public ?string $accountNumber;

    #[MapFrom('data.account_name')]
    public ?string $accountName;
}
