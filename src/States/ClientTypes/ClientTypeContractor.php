<?php

declare(strict_types=1);

namespace Kaisar\WalletTransfer\States\ClientTypes;

interface ClientTypeContractor
{
    /**
     * @return float
     */
    public function commissionFee(): float;
}
