<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salutation extends Model
{
    use Notifiable, SoftDeletes;
    protected $table = 'anrede';
    protected $fillable = ['bezeichnung'];
}
