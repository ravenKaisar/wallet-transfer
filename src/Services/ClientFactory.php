<?php

declare(strict_types=1);

namespace Kaisar\WalletTransfer\Services;

use Kaisar\WalletTransfer\Exception\ClientTypeNotFoundException;
use Kaisar\WalletTransfer\States\ClientTypes\{BusinessClient, ClientTypeContractor, PrivateClient};

class ClientFactory
{
    /**
     * @param $clientType
     * @return ClientTypeContractor
     * @throws ClientTypeNotFoundException
     */
    public function __invoke($clientType): ClientTypeContractor
    {
        if ($clientType == 'business') {
            return new BusinessClient();
        } elseif ($clientType == 'private') {
            return new PrivateClient();
        }

        throw new ClientTypeNotFoundException("$clientType client type unsupported");
    }
}
