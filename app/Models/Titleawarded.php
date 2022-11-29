<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Titleawarded extends Model
{
    use Notifiable, SoftDeletes;
    protected $table = 'titel_verliehen';
    protected $fillable = ['bezeichnung'];
}
