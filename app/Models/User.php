<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'ist_aktivi', 'birthPlace', 'birthDate', 'phone'];
    protected $hidden = ['password', 'remember_token'];
    protected $casts = ['email_verified_at' => 'datetime'];

    public function role_list()
    {
        return $this->hasOne('App\Models\RoleUsers', 'user_id', 'id')->with(['permission_list']);
    }

    public function getRoleIDAttribute()
    {
        return $this->role_list->role_id ?? null;
    }
}
