<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User_organisation extends Model
{
    use Notifiable;
    protected $table = 'user_organisation';
    protected $fillable = ['user_id', 'organisation_id'];
}
