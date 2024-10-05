<?php

namespace App\Services\CryptoService\V1\Resources;

use App\Services\CryptoService\V1\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Transaction $this */

        return [
            'id'               => $this->id,
            'user_id'          => $this->user_id,
            'wallet_id'        => $this->wallet_id,
            'currency'         => $this->currency->name,
            'amount'           => $this->amount,
            'transaction_type' => $this->type,
            'created_at'       => $this->created_at->toDateTimeString(),
        ];

    }
}
