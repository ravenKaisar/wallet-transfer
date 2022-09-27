<?php


use Kaisar\WalletTransfer\Exception\OperationNotFoundException;
use Kaisar\WalletTransfer\Services\OperationFactory;

it('accept operation  is correct and get operation commission', function () {
    $commission = (new OperationFactory())('deposit')->commissionFee();
    expect(0.03)->toEqual(0.03);
});


it('input the wrong operation and expect a exception', function () {
    $commission = (new OperationFactory())('withdrawa')->commissionFee();
})->throws(OperationNotFoundException::class);
