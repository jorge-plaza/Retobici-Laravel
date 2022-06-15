<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array)
 */
class Stop extends Model
{
    use HasFactory;

    protected $fillable = [
        "lng",
        "lat",
        "address",
        "total_spaces"
    ];

    public function bikes(): HasMany{
        return $this->hasMany(Bike::class);
    }

    public function routes(): HasMany{
        return $this->hasMany(Route::class);
    }

    public function routesStart(): HasMany{
        return $this->hasMany(Route::class, "initial_stop_id");
    }
    public function routesEnd(): HasMany{
        return $this->hasMany(Route::class, "final_stop_id");
    }
}
