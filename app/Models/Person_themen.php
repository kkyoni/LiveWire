<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Person_themen extends Model
{
    use Notifiable;
    protected $table = 'person_themen';
    protected $fillable = ['person_id', 'themengebiet_id', 'funktion_id', 'abteilung'];

    public function person_themen_functions_releation()
    {
        return $this->hasMany('App\Models\Functions', 'id', 'funktion_id');
    }
}
