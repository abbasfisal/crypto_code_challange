<?php

use App\Services\CryptoService\V1\Controllers\User\TransactionController;
use App\Services\CryptoService\V1\Controllers\User\WalletController;
use Illuminate\Support\Facades\Route;


Route::middleware(['api'])->prefix('/api/v1')->group(function () {

    Route::group(['prefix' => '/user/', 'as' => 'user.'], function () {

        //api/v1/user/{userId}/balance/{currencyId}
        Route::get('/{userId}/balance/{currencyId}', [WalletController::class, 'getUserbalance'])->name('balance');//api/v1/user/1/balance/1

        Route::group(['prefix' => '/transactions/', 'as' => 'transactions.'], function () {

            //api/v1/user/transaction/process
            Route::post('/process', [TransactionController::class, 'processTransaction'])->name('process');

            //api/v1/user/transactions
            Route::get('/', [TransactionController::class, 'index'])->name('index');
        });

    });
});

