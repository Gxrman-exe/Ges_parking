<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'payment_method_id',
        'special_rate_id',
        'vehicle_id',
        'paymenet_date',
        'paid_amount',
        'payment_status',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function PaymentMethod()
    {
        return $this->hasMany(PaymentMethod::class, 'id', 'payment_method_id');
    }
    public function SpecialRate()
    {
        return $this->hasMany(SpecialRate::class, 'id', 'special_rate_id');
    }
    public function Vehicle()
    {
        return $this->hasMany(Vehicle::class, 'id', 'vehicle_id');
    }
}
