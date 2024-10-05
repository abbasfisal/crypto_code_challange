<?php

namespace App\Services\CryptoService\V1\Providers;


use App\Services\CryptoService\V1\Repositories\Transaction\TransactionRepository;
use App\Services\CryptoService\V1\Repositories\Transaction\TransactionRepositoryInterface;
use App\Services\CryptoService\V1\Repositories\Wallet\WalletRepository;
use App\Services\CryptoService\V1\Repositories\Wallet\WalletRepositoryInterface;
use App\Services\CryptoService\V1\Services\TransactionService\TransactionService;
use App\Services\CryptoService\V1\Services\TransactionService\TransactionServiceInterface;
use App\Services\CryptoService\V1\Services\WalletService\WalletService;
use App\Services\CryptoService\V1\Services\WalletService\WalletServiceInterface;
use Illuminate\Support\ServiceProvider;

class CryptoServiceProvider extends ServiceProvider
{

    public function register()
    {

        //wallet [repo,service]
        $this->app->bind(WalletServiceInterface::class, WalletService::class);
        $this->app->bind(WalletRepositoryInterface::class, WalletRepository::class);

        //transaction [repo,service]
        $this->app->bind(TransactionServiceInterface::class, TransactionService::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);

    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
    }

}
