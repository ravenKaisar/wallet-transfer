<?php

declare(strict_types=1);

namespace Kaisar\WalletTransfer\States\Currencies;

use Kaisar\WalletTransfer\Support\Rates;

class USDCurrency implements CurrencyContractor
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'United State Dollar';
    }

    public function getCurrencyRate()
    {
        return (new Rates())->get('USD');
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return 'USD';
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return '$';
    }
}
