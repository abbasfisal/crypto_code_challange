<?php

namespace App\Services\CryptoService\V1\Repositories\Transaction;

use App\Services\CryptoService\V1\Models\Transaction;
use App\Services\CryptoService\V1\Models\Wallet;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function __construct()
    {
    }

    /**
     * @throws \Exception
     */
    public function handleTransaction($data): Wallet|\Exception
    {

        DB::beginTransaction();
        try {

            Transaction::query()->create([
                'user_id'     => $data['user_id'],
                'wallet_id'   => $data['wallet_id'],
                'currency_id' => $data['currency_id'],
                'amount'      => $data['amount'],
                'type'        => $data['type'],
            ]);


            /** @var Wallet $wallet */
            $wallet = Wallet::query()->find($data['wallet_id']);

            if ($data['type'] == 'withdraw') {
                if ($wallet->balance < $data['amount']) {
                    throw new \Exception('Insufficient balance for withdrawal');
                }
                $wallet->balance -= $data['amount'];
            }
            if ($data['type'] == 'deposit') {
                $wallet->balance += $data['amount'];
            }

            $wallet->save();

            DB::commit();

            return $wallet;

        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception('failed to create transaction' . $e->getMessage());
        }

    }

    public function getUserTransactions($userId, $currencyId, $startDate, $endDate): Collection|array
    {

        return Transaction::query()
            ->where('user_id', $userId)
            ->when($currencyId, function ($query) use ($currencyId) {
                return $query->where('currency_id', $currencyId);
            })
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                return $query->whereBetween('created_at', [$startDate, $endDate]);
            })
            ->get();
    }

}
