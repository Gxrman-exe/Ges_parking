<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleClient extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vehicle_id',
        'client_id',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function vehicle()
    {
        return $this->morphMany(Vehicle::class, 'id', 'vehicle_id');
    }
    public function client()
    {
        return $this->morphMany(Client::class, 'id', 'client_id');
    }
}
