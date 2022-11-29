<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUsers extends Model
{
    protected $table = 'role_users';
    protected $fillable = ['user_id', 'role_id'];

    public function permission()
    {
        return $this->hasMany(Roles::class, 'id', 'role_id');
    }

    public function permission_list()
    {
        return $this->hasOne('App\Models\Roles', 'id', 'role_id');
    }
}
