<?php

namespace Kaisar\WalletTransfer\Transactions;

use Exception;
use Kaisar\WalletTransfer\Exception\{
    ClientTypeNotFoundException,
    CurrencyNotFoundException,
    OperationNotFoundException,
    TransactionValidateException
};

class TransactionList
{
    public function __construct(
        private array $rows = []
    ) {
    }


    /**
     * @return array
     * @throws CurrencyNotFoundException
     * @throws OperationNotFoundException
     * @throws TransactionValidateException
     * @throws ClientTypeNotFoundException
     * @throws Exception
     */
    public function make(): array
    {
        $data = [];
        $userTransaction = [];
        $perWeekFreeAmount = 1000;
        foreach ($this->rows as $row) {
            $transaction = (new Transaction($row))->validate()->getRate()->applyCommission()->format();
            if ($transaction['userType'] == 'private' && $transaction['operationType'] == 'withdraw') {
                $getWeekNumber = getWeekNumberWithYear($transaction['date']);
                $transactionAmount = $transaction['amount'];
                $total = 0;
                $count = 0;
                if (isset($userTransaction[$getWeekNumber . $transaction['user']])) {
                    $count = count($userTransaction[$getWeekNumber . $transaction['user']]);
                    $total = array_sum($userTransaction[$getWeekNumber . $transaction['user']]);
                }

                if ($transaction['currency'] != 'EUR') {
                    $transactionAmount /= $transaction['rate'];
                }

                $amount = 0;

                if ($total <= $perWeekFreeAmount && $count <= 3) {
                    $amount = $perWeekFreeAmount - $total;
                }

                if ($transactionAmount < $amount) {
                    $transaction['total'] = 0;
                } else {
                    $total = ((($transaction['currency'] != 'EUR' ? $transaction['amount'] : $transactionAmount) - ($transaction['currency'] != 'EUR' ? $amount * $transaction['rate'] : $amount)) * $transaction['commission']) / 100;
                    $transaction['total'] = nearestRounded($total);
                }

                $userTransaction[$getWeekNumber . $transaction['user']][] = $transactionAmount;
            }
            $data[] = $transaction['total'];
        }
        return $data;
    }
}
