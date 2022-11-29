<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitglied_netzwerkpartner extends Model
{
    protected $table = 'mitglied_netzwerkpartner';
    protected $fillable = ['mitglied_id', 'netzwerkpartner_id', 'funktion_id', 'abteilung'];

    public function mitglied_netzwerkpartner_relation()
    {
        return $this->hasMany('App\Models\Functions', 'id', 'funktion_id');
    }
}
