<?php

namespace App\Services\CryptoService\V1\Requests;


use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'user_id'     => 'required|exists:users,id',
            'wallet_id'   => 'required|exists:wallets,id',
            'currency_id' => 'required|exists:currencies,id',
            'amount'      => 'required|numeric|min:0.01',
            'type'        => 'required|in:deposit,withdraw',
        ];
    }
}
