<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = "roles_permissions";
    protected $fillable = [
        'permission_id',
        'roles_id',
    ];

    public function Permissions()
    {
        return $this->hasMany(Permission::class, 'id');
    }
    public function Role()
    {
        return $this->hasOne(Role::class, 'id');
    }
}
