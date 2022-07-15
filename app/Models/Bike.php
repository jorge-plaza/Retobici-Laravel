<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

/**
 * @method static create(array $array)
 * @method static find(int $int)
 * @property mixed $id
 * @property mixed $bikeable_type
 * @property mixed|null $stop_id
 */
class Bike extends Model
{
    use HasFactory;

    protected $table = "bikes";

    protected $fillable = [
        'stop_id',
        'unlocked',
        'type'
    ];

    public function stop(): BelongsTo{
        return $this->belongsTo(Stop::class);
    }

    public function routes(): HasMany{
        return $this->hasMany(Route::class);
    }

    public function bikeable(){
        return $this->morphTo();
    }
}
