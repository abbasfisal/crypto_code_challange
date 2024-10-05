<?php

namespace App\Services\CryptoService\V1\Services\WalletService;

interface WalletServiceInterface
{
    public function getBalanceByCurrency($userId, $currencyId);
}
