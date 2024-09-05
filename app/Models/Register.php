<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'vehicle_id',
        'user_code',
        'have_permission',
        'action_performed',
        'date',
        'module_code',
        'date_time_admission',
        'date_time_exit',
        'comment',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function RegisterUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    } 
    public function RegisterVehicle()
    {
        return $this->hasOne(Vehicle::class, 'id', 'vehicle_id');
    } 
}
