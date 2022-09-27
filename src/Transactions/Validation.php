<?php

namespace Kaisar\WalletTransfer\Transactions;

use DateTime;

class Validation
{
    private string $format = 'Y-m-d';

    public function __construct(
        private array $data,
    ) {
    }

    public function validate(): bool
    {
        return
            self::datePrepare() &&
            self::userPrepare() &&
            self::userTypePrepare() &&
            self::operationTypePrepare() &&
            self::currencyPrepare() &&
            self::amountPrepare();
    }

    private function datePrepare(): bool
    {
        $datetime = DateTime::createFromFormat($this->format, $this->data['date']);
        return isset($this->data['date']) && $datetime && $datetime->format($this->format) == $this->data['date'];
    }

    private function userPrepare(): bool
    {
        return isset($this->data['user']);
    }

    private function userTypePrepare(): bool
    {
        return isset($this->data['userType']) && in_array($this->data['userType'], ['business', 'private']);
    }

    private function operationTypePrepare(): bool
    {
        return isset($this->data['operationType']) && in_array($this->data['operationType'], ['withdraw', 'deposit']);
    }

    private function currencyPrepare(): bool
    {
        return isset($this->data['currency']) && in_array($this->data['currency'], ['EUR', 'USD', 'JPY']);
    }

    private function amountPrepare(): bool
    {
        return isset($this->data['amount']);
    }
}
