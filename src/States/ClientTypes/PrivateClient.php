<?php

declare(strict_types=1);

namespace Kaisar\WalletTransfer\States\ClientTypes;

class PrivateClient implements ClientTypeContractor
{
    /**
     * @return float
     */
    public function commissionFee(): float
    {
        return 0.3;
    }
}
