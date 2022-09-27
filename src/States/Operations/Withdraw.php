<?php

namespace Kaisar\WalletTransfer\States\Operations;

use Kaisar\WalletTransfer\States\ClientTypes\ClientTypeContractor;

class Withdraw implements OperationContractor
{
    public function __construct(private readonly ClientTypeContractor $clientTypeContractor)
    {
    }

    /**
     * @return float
     */
    public function commissionFee(): float
    {
        return $this->clientTypeContractor->commissionFee();
    }
}
