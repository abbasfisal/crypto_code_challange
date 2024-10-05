<?php

namespace App\Services\CryptoService\V1\Repositories\Wallet;

interface WalletRepositoryInterface
{
    public function getBalanceByCurrency($userId, $currencyId);
}
