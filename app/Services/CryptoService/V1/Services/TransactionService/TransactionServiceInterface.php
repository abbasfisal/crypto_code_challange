<?php

namespace App\Services\CryptoService\V1\Services\TransactionService;

interface TransactionServiceInterface
{
    public function handleTransaction($data);

    public function transactionIndex($data);
}
