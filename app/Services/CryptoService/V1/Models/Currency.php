<?php

namespace App\Services\CryptoService\V1\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int    $id
 * @property string $name
 * @property string $code
 */
class Currency extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code'];


    /**
     *------------------------
     *      relations
     *------------------------
     */
    public function wallets(): HasMany
    {
        return $this->hasMany(Wallet::class);
    }
}
