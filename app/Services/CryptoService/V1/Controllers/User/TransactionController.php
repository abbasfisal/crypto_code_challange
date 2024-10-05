<?php

namespace App\Services\CryptoService\V1\Controllers\User;


use App\Services\CryptoService\V1\Requests\TransactionIndexRequest;
use App\Services\CryptoService\V1\Requests\TransactionRequest;
use App\Services\CryptoService\V1\Resources\TransactionResource;
use App\Services\CryptoService\V1\Services\TransactionService\TransactionServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;

class TransactionController
{
    public function __construct(public TransactionServiceInterface $service)
    {
    }

    public function processTransaction(TransactionRequest $request): JsonResponse
    {
        try {

            $wallet = $this->service->handleTransaction($request->validated());

            return response()->json(
                [
                    'message' => 'Transaction successful',
                    'wallet'  => $wallet->toArray(),
                ]
            );

        } catch (\Exception $e) {
            Log::critical('transaction failed :', ['code' => $e->getCode(), 'message' => $e->getMessage()]);
            return response()->json(['message' => 'Transaction failed'], 400);
        }
    }

    public function index(TransactionIndexRequest $request): AnonymousResourceCollection
    {
        $result = $this->service->transactionIndex($request->validated());

        return TransactionResource::collection($result);
    }
}
