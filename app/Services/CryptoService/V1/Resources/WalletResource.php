<?php

namespace App\Services\CryptoService\V1\Resources;

use App\Services\CryptoService\V1\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Wallet $this */
        return [
            'user_id'  => $this->user_id ?? null,
            'currency' => [
                'id'   => $this->currency_id ?? null,
                'name' => $this->currency->name ?? null,
                'code' => $this->currency->code ?? null
            ],
            'balance'  => $this->balance ?? null
        ];
    }
}
