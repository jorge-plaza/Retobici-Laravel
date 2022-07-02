<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property mixed $user_id
 * @property \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed $initial_stop_id
 * @property mixed $bike_id
 * @method static find(mixed $id)
 */
class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "initial_stop_id",
        "final_stop_id",
        "bike_id",
        "distance",
        "duration",
        "estimated_duration",
        "points",
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(Route::class);
    }

    public function start(): BelongsTo{
        return $this->belongsTo(Stop::class,'initial_stop_id');
    }

    public function end(): BelongsTo{
        return $this->belongsTo(Stop::class, "final_stop_id");
    }

    public function bike(): BelongsTo{
        return $this->belongsTo(Bike::class);
    }
}
