<?php


use Kaisar\WalletTransfer\Exception\CurrencyNotFoundException;
use Kaisar\WalletTransfer\Services\CurrencyFactory;
use Kaisar\WalletTransfer\Support\Rates;

it('give the correct currency and get the actual rate', function () {
    $currency = 'USD';
    $rate = (new Rates())->get($currency);

    $currency = (new CurrencyFactory())($currency)->getCurrencyRate();
    expect($rate)->toEqual($rate);
});


it('input the wrong currency expect a exception', function () {
    $currency = (new CurrencyFactory())('BDT')->getCurrencyRate();
})->throws(CurrencyNotFoundException::class);
