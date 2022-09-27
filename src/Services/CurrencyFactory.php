<?php

declare(strict_types=1);

namespace Kaisar\WalletTransfer\Services;

use Kaisar\WalletTransfer\States\Currencies\{CurrencyContractor, EURCurrency, JPYCurrency, USDCurrency};
use Kaisar\WalletTransfer\Exception\CurrencyNotFoundException;

class CurrencyFactory
{
    /**
     * @param $currencyType
     * @return CurrencyContractor
     * @throws CurrencyNotFoundException
     */
    public function __invoke($currencyType): CurrencyContractor
    {
        if ($currencyType == 'JPY') {
            return new JPYCurrency();
        } elseif ($currencyType == 'USD') {
            return new USDCurrency();
        } elseif ($currencyType == 'EUR') {
            return new EURCurrency();
        }

        throw new CurrencyNotFoundException("$currencyType currency type unsupported");
    }
}
