<?php

namespace App\Services\CryptoService\V1\Services\TransactionService;

use App\Services\CryptoService\V1\Repositories\Transaction\TransactionRepositoryInterface;

class TransactionService implements TransactionServiceInterface
{
    public function __construct(public TransactionRepositoryInterface $repository)
    {
    }

    public function handleTransaction($data)
    {
        return $this->repository->handleTransaction($data);
    }

    public function transactionIndex($data)
    {
        return $this->repository->getUserTransactions($data['user_id'], $data['currency_id'] ?? '', $data['start_date'] ?? '', $data['end_date'] ?? '');
    }
}
