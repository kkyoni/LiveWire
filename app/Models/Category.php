<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use Notifiable, SoftDeletes;
    protected $table = 'kategorie_organisation';
    protected $fillable = ['bezeichnung'];
}
