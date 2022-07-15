<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use phpDocumentor\Reflection\Types\Boolean;
use PhpParser\Node\Expr\Cast\Int_;

/**
 * @method static create(array $array)
 * @method static find($initial_stop_id)
 * @property mixed $lng
 * @property mixed $lat
 * @property mixed $total_spaces
 * @property mixed $id
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

    public function reservations(): HasMany{
        return $this->hasMany(Reservation::class);
    }

    public function reserved_pedal_bikes(): int{
        return $this->reservations()->where('bike_type', '=', 'pedal')->count();
    }
    public function reserved_electric_bikes(): int{
        return $this->reservations()->where('bike_type', '=', 'electric')->count();
    }

    public function check_availability_bikes(String $type): bool{
        $available = false;
        if ($type=="pedal" || $type=="App\Models\Bike"){
            $bikeCount = $this->bikes()->where('bikeable_type', '=', 'App\Models\Bike')->count();
            $available = $bikeCount > $this->reserved_pedal_bikes();
        }else if ($type=="electric" || $type=="App\Models\ElectricBike"){
            $bikeCount = $this->bikes()->where('bikeable_type', '=', 'App\Models\ElectricBike')->count();
            $available = $bikeCount > $this->reserved_electric_bikes();
        }
        return $available;
    }
}
