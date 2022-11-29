<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Person_mitglied extends Model
{
    use Notifiable;
    protected $table = 'person_mitglied';
    protected $fillable = ['person_id', 'mitglied_id', 'funktion_id', 'abteilung'];

    public function person_mitglied_functions_releation()
    {
        return $this->hasMany('App\Models\Functions', 'id', 'funktion_id');
    }
}
