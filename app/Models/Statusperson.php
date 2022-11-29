<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Statusperson extends Model
{
    use Notifiable, SoftDeletes;
    protected $table = 'status_person';
    protected $fillable = ['bezeichnung'];
}
