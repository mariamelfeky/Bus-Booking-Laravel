<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'time'];

    public function stations()
    {
        return $this->belongsToMany(Station::class)->withPivot('stop_order');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->using(Tripuser::class)->withPivot(['pickup_station_id', 'arrival_station_id', 'seat_number']);
    }
}
