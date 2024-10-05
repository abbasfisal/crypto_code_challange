<?php

namespace App\Services\CryptoService\V1\Repositories\Transaction;

interface TransactionRepositoryInterface
{
    public function handleTransaction($data);

    public function getUserTransactions($userId, $currencyId, $startDate, $endDate);
}
