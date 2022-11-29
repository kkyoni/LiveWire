<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BranchOffice extends Model
{
    use Notifiable, SoftDeletes;
    protected $table = 'mitglied';
    protected $fillable = ['organisation_id', 'bezeichnung', 'feei_id', 'ort_id', 'einteilung', 'feei_kv', 'feei_member', 'ev_member', 'adresse', 'email', 'telefon', 'fax', 'web', 'status_id'];

    public function organisations_list()
    {
        return $this->hasOne('App\Models\Organisations', 'id', 'organisation_id');
    }

    public function ort_list()
    {
        return $this->hasOne('App\Models\City', 'id', 'ort_id');
    }

    public function status_list()
    {
        return $this->hasOne('App\Models\Status', 'id', 'status_id');
    }

    public function user_details()
    {
        return $this->belongsToMany(User::class, 'user_mitglied', 'mitglied_id', 'user_id')->withTimestamps();
    }

    public function themen_detalis()
    {
        return $this->belongsToMany(Topic::class, 'mitglied_themen', 'mitglied_id', 'themengebiet_id')->withPivot(['funktion_id', 'abteilung'])->withTimestamps();
    }

    public function network_detalis()
    {
        return $this->belongsToMany(NetworkPartner::class, 'mitglied_netzwerkpartner', 'mitglied_id', 'netzwerkpartner_id')->withPivot(['funktion_id', 'abteilung'])->withTimestamps();
    }

    public function person_detalis()
    {
        return $this->belongsToMany(Person::class, 'person_mitglied', 'mitglied_id', 'person_id')->withPivot(['funktion_id', 'abteilung'])->withTimestamps();
    }
}
