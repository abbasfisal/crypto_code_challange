<?php

namespace App\Services\CryptoService\V1\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int      $id
 * @property int      $user_id
 * @property int      $currency_id
 * @property float    $balance
 *
 *
 *
 * @property Currency $currency
 * @property User     $user
 * @property HasMany  $transactions
 */
class Wallet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'currency_id', 'balance'];


    /**
     *------------------------
     *      relations
     *------------------------
     */

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
