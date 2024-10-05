<?php

namespace App\Services\CryptoService\V1\Models;

use App\Models\User;
use Carbon\Traits\Date;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int      id
 * @property int      user_id
 * @property int      wallet_id
 * @property Currency currency
 * @property float    amount
 * @property string   type
 * @property Date     created_at
 * @property Date     updated_at
 */
class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'wallet_id',
        'currency_id',
        'amount',
        'type',
    ];


    /**
     *------------------------
     *      relations
     *------------------------
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class);
    }
}
