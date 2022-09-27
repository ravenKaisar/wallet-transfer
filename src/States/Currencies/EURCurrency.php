<?php

declare(strict_types=1);

namespace Kaisar\WalletTransfer\States\Currencies;

use Kaisar\WalletTransfer\Support\Rates;

class EURCurrency implements CurrencyContractor
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'European Union';
    }

    public function getCurrencyRate()
    {
        return (new Rates())->get('EUR');
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return 'EUR';
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return '€';
    }
}
