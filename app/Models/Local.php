<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    // protected $table = ['countries'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'city_id',
        'local_name',
        'nit',
        'direction',
        'active',
        'iva_enabled',
        'iva_percentage',
        'local_code',
        'rate_time',
        'license_type',
        'license',
        'rate_value',
        'max_output_time',
        'available_spaces'
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function local()
    {
        return $this->hasMany(City::class, 'id', 'city_id');
    }
}
