<?php

namespace Kaisar\WalletTransfer\States\Operations;

class Deposit implements OperationContractor
{
    /**
     * @return float
     */
    public function commissionFee(): float
    {
        return 0.03;
    }
}
