<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use Notifiable, SoftDeletes;
    protected $table = 'person';
    protected $fillable = ['person', 'person_id', 'nachname', 'vorname', 'anrede_id', 'sprache', 'anrede_brief_manuell', 'anrede_adresse_manuell', 'titel_id', 'titel_verliehen_id', 'titel_nachgestellt_id', 'email', 'telefon', 'mobil', 'email2', 'telefon2', 'mobil2', 'fax', 'person_id_assistenz', 'person_id_assistenz2', 'status_person_id', 'sprach', 'person_stakeholder_id'];

    public function status_list()
    {
        return $this->hasOne('App\Models\Status', 'id', 'status_person_id');
    }

    public function branchoffice_detalis()
    {
        return $this->belongsToMany(BranchOffice::class, 'person_mitglied', 'person_id', 'mitglied_id')->withPivot(['funktion_id', 'abteilung'])->withTimestamps();
    }

    public function netzwerkpartner_detalis()
    {
        return $this->belongsToMany(NetworkPartner::class, 'person_netzwerkpartner', 'person_id', 'netzwerkpartner_id')->withPivot(['funktion_id', 'abteilung'])->withTimestamps();
    }

    public function organisation_detalis()
    {
        return $this->belongsToMany(Organisations::class, 'person_organisation', 'person_id', 'organisation_id')->withPivot(['funktion_id', 'abteilung'])->withTimestamps();
    }

    public function themen_detalis()
    {
        return $this->belongsToMany(Topic::class, 'person_themen', 'person_id', 'themengebiet_id')->withPivot(['funktion_id', 'abteilung'])->withTimestamps();
    }

    public function user_detalis()
    {
        return $this->belongsToMany(User::class, 'user_person', 'person_id', 'user_id')->withTimestamps();
    }
}
