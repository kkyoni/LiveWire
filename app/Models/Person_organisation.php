<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Person_organisation extends Model
{
    use Notifiable;
    protected $table = 'person_organisation';
    protected $fillable = ['person_id', 'organisation_id', 'funktion_id', 'abteilung'];

    public function person_organisation_functions_releation()
    {
        return $this->hasMany('App\Models\Functions', 'id', 'funktion_id');
    }
}
