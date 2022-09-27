<?php

declare(strict_types=1);

namespace Kaisar\WalletTransfer\States\Operations;

interface OperationContractor
{
    /**
     * @return float
     */
    public function commissionFee(): float;
}
