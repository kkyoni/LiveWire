<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User_mitglied extends Model
{
    use Notifiable;
    protected $table = 'user_mitglied';
    protected $fillable = ['user_id', 'mitglied_id'];
}
