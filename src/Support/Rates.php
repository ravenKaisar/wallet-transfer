<?php

declare(strict_types=1);

namespace Kaisar\WalletTransfer\Support;

class Rates
{
    protected static array $rates = [];

    public function __construct()
    {
        if (isset($_ENV['environment']) && $_ENV['environment'] == 'Production') {
            $currencyExchange = json_decode(file_get_contents('https://developers.Kaisar.com/tasks/api/currency-exchange-rates'), true);
            static::$rates = $currencyExchange['rates'];
        } else {
            static::$rates = [
                'USD' => 1.1497,
                'JPY' => 129.53,
            ];
        }

        static::$rates['EUR'] = 1;
    }

    public function get(string $rate)
    {
        return static::$rates[strtoupper($rate)];
    }
}
