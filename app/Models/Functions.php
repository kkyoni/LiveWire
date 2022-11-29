<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Functions extends Model
{
    use Notifiable, SoftDeletes;
    protected $table = 'funktion';
    protected $fillable = ['bezeichnung'];
}
