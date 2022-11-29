<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use Notifiable, SoftDeletes;
    protected $table = 'status';
    protected $fillable = ['bezeichnung'];
}
