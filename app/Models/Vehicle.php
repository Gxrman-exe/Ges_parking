<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'local_id',
        'client_id',
        'plate',
        'vehicle_type',
        'locker_use',
        'additional_value_locker',
        'helmet_use',
        'additional_value_case',
        'vehicle_status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function Local()
    {
        return $this->hasMany(Local::class,'id','local_id');
    }
    
    public function Vehicle()
    {
        return $this->belongsToMany(Vehicle::class, 'id', 'client_id',);
    }
    
}
