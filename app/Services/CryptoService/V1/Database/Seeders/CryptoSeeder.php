<?php

namespace App\Services\CryptoService\V1\Database\Seeders;

use App\Models\User;
use App\Services\CryptoService\V1\Models\Currency;
use App\Services\CryptoService\V1\Models\Wallet;
use Illuminate\Database\Seeder;

class CryptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $this->createUser();
        $this->createWallets();
    }

    /**
     * Create sample users.
     */
    public function createUser(): void
    {
        User::factory()->create([
            'name'  => 'ali',
            'email' => 'ali@gmail.com',
        ]);

        User::factory()->create([
            'name'  => 'reza',
            'email' => 'reza@gmail.com',
        ]);
    }

    /**
     * Create wallets and add balance for each user and currency.
     */
    public function createWallets(): void
    {
        Currency::query()->insert([
            ['code' => 'BTC', 'name' => 'Bitcoin'],
            ['code' => 'USDT', 'name' => 'Tether'],
            ['code' => 'TON', 'name' => 'TON Coin'],
            ['code' => 'ETH', 'name' => 'Ethereum'],
        ]);

        // Fetch all users and currencies
        $users = User::all();
        $currencies = Currency::all();

        foreach ($users as $user) {
            foreach ($currencies as $currency) {
                Wallet::query()->create([
                    'user_id'     => $user->id,
                    'currency_id' => $currency->id,
                    'balance'     => 1000.00000000
                ]);
            }
        }
    }
}
