<?php

declare(strict_types=1);

namespace Kaisar\WalletTransfer\States\Currencies;

use Kaisar\WalletTransfer\Support\Rates;

class JPYCurrency implements CurrencyContractor
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'Japanese Yen';
    }


    public function getCurrencyRate()
    {
        return (new Rates())->get('JPY');
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return 'JPY';
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return '¥';
    }
}
