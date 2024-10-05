<?php

namespace App\Services\CryptoService\V1\Requests;


use Illuminate\Foundation\Http\FormRequest;

class TransactionIndexRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'user_id'     => 'required|exists:users,id',
            'currency_id' => 'nullable|exists:currencies,id',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date'
        ];
    }

    public function all($keys = null): array|string|null
    {
        return array_merge(parent::all(), $this->query());
    }
}
