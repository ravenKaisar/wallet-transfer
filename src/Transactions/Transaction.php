<?php

namespace Kaisar\WalletTransfer\Transactions;

use Kaisar\WalletTransfer\Exception\{ClientTypeNotFoundException,
    CurrencyNotFoundException,
    OperationNotFoundException,
    TransactionValidateException};
use Kaisar\WalletTransfer\Services\{ClientFactory, CurrencyFactory, OperationFactory};

class Transaction
{
    private float $commission = 0;
    private $rate = 1;

    public function __construct(
        private array $row = []
    ) {
    }

    public function validate(): self
    {
        if (!(count($this->row) >= 6 && (new Validation($this->format()))->validate())) {
            throw new TransactionValidateException(implode(', ', $this->row) . " row is invalid");
        }

        return $this;
    }

    /**
     * @throws CurrencyNotFoundException
     */
    public function getRate(): static
    {
        if ($this->row[5] != 'EUR') {
            $currency = (new CurrencyFactory())($this->row[5]);
            $this->rate = $currency->getCurrencyRate();
            return $this;
        }

        return $this;
    }

    /**
     * @throws OperationNotFoundException
     * @throws ClientTypeNotFoundException
     */
    public function applyCommission(): static
    {
        $client = (new ClientFactory())($this->row[2]);
        $operation = (new OperationFactory())($this->row[3], $client);
        $this->commission = $operation->commissionFee();

        return $this;
    }

    public function format(): array
    {
        return [
            'date' => $this->row[0],
            'user' => $this->row[1],
            'userType' => $this->row[2],
            'operationType' => $this->row[3],
            'amount' => $this->row[4],
            'currency' => $this->row[5],
            'commission' => $this->commission,
            'rate' => $this->rate,
            'total' => ($this->row[4] * $this->commission) / 100,
        ];
    }
}
