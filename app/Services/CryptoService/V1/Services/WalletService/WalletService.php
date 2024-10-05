<?php

namespace App\Services\CryptoService\V1\Services\WalletService;

use App\Services\CryptoService\V1\Repositories\Wallet\WalletRepositoryInterface;

class WalletService implements WalletServiceInterface
{
    public function __construct(public WalletRepositoryInterface $walletRepository)
    {
    }

    public function getBalanceByCurrency($userId, $currencyId)
    {
        return $this->walletRepository->getBalanceByCurrency($userId, $currencyId);
    }
}
