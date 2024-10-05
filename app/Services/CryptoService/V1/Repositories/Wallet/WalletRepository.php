<?php

namespace App\Services\CryptoService\V1\Repositories\Wallet;

use App\Services\CryptoService\V1\Models\Wallet;

class WalletRepository implements WalletRepositoryInterface
{

    public function getBalanceByCurrency($userId, $currencyId)
    {
        return Wallet::query()
            ->where('user_id', $userId)
            ->where('currency_id', $currencyId)
            ->first();

    }
}
