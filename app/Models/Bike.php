<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array)
 */
class Bike extends Model
{
    use HasFactory;

    protected $fillable = [
        'stop_id',
        'unlocked',
    ];

    public function stop(): BelongsTo{
        return $this->belongsTo(Stop::class);
    }

    public function routes(): HasMany{
        return $this->hasMany(Route::class);
    }
}
