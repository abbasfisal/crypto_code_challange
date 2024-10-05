<?php

namespace App\Services\CryptoService\V1\Controllers\User;

use App\Services\CryptoService\V1\Resources\WalletResource;
use App\Services\CryptoService\V1\Services\WalletService\WalletServiceInterface;


class WalletController
{
    public function __construct(public WalletServiceInterface $walletService)
    {
    }


    public function getUserbalance($userId, $currencyId): WalletResource
    {
        $wallet = $this->walletService->getBalanceByCurrency($userId, $currencyId);

        return new WalletResource($wallet);
    }
}
