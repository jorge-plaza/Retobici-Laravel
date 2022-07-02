<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $user_id
 * @property mixed $stop_id
 * @property mixed|String $bike_type
 */
class Reservation extends Model
{
    use HasFactory;

    public function user(): BelongsTo{
        return $this->belongsTo(Route::class);
    }

    public function stop(): BelongsTo{
        return $this->belongsTo(Stop::class);
    }
}
