<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person_netzwerkpartner extends Model
{
    protected $table = 'person_netzwerkpartner';
    protected $fillable = ['person_id', 'netzwerkpartner_id', 'funktion_id', 'abteilung'];

    public function network_person_relation()
    {
        return $this->hasMany('App\Models\Functions', 'id', 'funktion_id');
    }
}
