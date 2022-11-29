<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitglied_themen extends Model
{
    protected $table = 'mitglied_themen';
    protected $fillable = ['mitglied_id', 'themengebiet_id', 'funktion_id', 'abteilung'];

    public function mitglied_themen_relation()
    {
        return $this->hasMany('App\Models\Functions', 'id', 'funktion_id');
    }
}
