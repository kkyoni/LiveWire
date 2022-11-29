<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User_person extends Model
{
    use Notifiable;
    protected $table = 'user_person';
    protected $fillable = ['user_id', 'person_id'];
}
