<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class NetworkPartner extends Model
{
    use Notifiable, SoftDeletes;
    protected $table = 'netzwerkpartner';
    protected $fillable = ['bezeichnung', 'synonyme', 'adresse', 'ort_id', 'email', 'telefon', 'web'];

    public function ort_list()
    {
        return $this->hasOne('App\Models\City', 'id', 'ort_id');
    }

    public function branchoffice_detalis()
    {
        return $this->belongsToMany(BranchOffice::class, 'mitglied_netzwerkpartner', 'netzwerkpartner_id', 'mitglied_id')->withPivot(['funktion_id', 'abteilung'])->withTimestamps();
    }

    public function person_detalis()
    {
        return $this->belongsToMany(Person::class, 'person_netzwerkpartner', 'netzwerkpartner_id', 'person_id')->withPivot(['funktion_id', 'abteilung'])->withTimestamps();
    }
}
