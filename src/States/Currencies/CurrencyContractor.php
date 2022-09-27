<?php

declare(strict_types=1);

namespace Kaisar\WalletTransfer\States\Currencies;

interface CurrencyContractor
{
    /**
     * @return string
     */
    public function getCode(): string;

    /**
     * @return string
     */
    public function getSymbol(): string;

    /**
     * @return string
     */
    public function getName(): string;

    public function getCurrencyRate();
}
