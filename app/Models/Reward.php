<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static create(array $array)
 * @property mixed $redeemed
 * @property mixed $total_available
 * @property mixed $points
 */
class Reward extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'reward_id',
        'points',
        'total_available',
        'image',
        'redeemed',
    ];

    public function users(): BelongsToMany{
        return $this->belongsToMany(User::class, 'user_reward')->withTimestamps();
    }
}
