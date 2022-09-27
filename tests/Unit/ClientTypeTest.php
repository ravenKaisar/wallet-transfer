<?php


use Kaisar\WalletTransfer\Exception\ClientTypeNotFoundException;
use Kaisar\WalletTransfer\Services\ClientFactory;

it('accept client type is correct and get client commission', function () {
    $commission = (new ClientFactory())('private')->commissionFee();
    expect(0.3)->toEqual(0.3);
});


it('input the wrong client type and expect a exception', function () {
    $commission = (new ClientFactory())('public')->commissionFee();
})->throws(ClientTypeNotFoundException::class);
