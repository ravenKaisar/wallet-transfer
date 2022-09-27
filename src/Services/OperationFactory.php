<?php

declare(strict_types=1);

namespace Kaisar\WalletTransfer\Services;

use Kaisar\WalletTransfer\Exception\OperationNotFoundException;
use Kaisar\WalletTransfer\States\Operations\{Deposit, Withdraw, OperationContractor};

class OperationFactory
{
    /**
     * @param $operationType
     * @param $clientType
     * @return OperationContractor
     * @throws OperationNotFoundException
     */
    public function __invoke($operationType, $clientType = null): OperationContractor
    {
        if ($operationType == 'withdraw') {
            return new Withdraw($clientType);
        } elseif ($operationType == 'deposit') {
            return new Deposit();
        }

        throw new OperationNotFoundException("$operationType operation type unsupported");
    }
}
