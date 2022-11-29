<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Organisation_themen extends Model
{
    use Notifiable;
    protected $table = 'organisation_themen';
    protected $fillable = ['organisation_id', 'themengebiet_id', 'funktion_id', 'abteilung'];

    public function organisation_themen_functions_releation()
    {
        return $this->hasMany('App\Models\Functions', 'id', 'funktion_id');
    }
}
