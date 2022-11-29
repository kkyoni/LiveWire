<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{
    use Notifiable, SoftDeletes;
    protected $table = 'themengebiet';
    protected $fillable = ['bezeichnung'];

    public function branchoffice_detalis()
    {
        return $this->belongsToMany(BranchOffice::class, 'mitglied_themen', 'themengebiet_id', 'mitglied_id')->withPivot(['funktion_id', 'abteilung'])->withTimestamps();
    }

    public function organisation_detalis()
    {
        return $this->belongsToMany(Organisation::class, 'organisation_themen', 'organisation_id', 'themengebiet_id')->withPivot(['funktion_id', 'abteilung'])->withTimestamps();
    }

    public function person_detalis()
    {
        return $this->belongsToMany(Person::class, 'person_themen', 'person_id', 'themengebiet_id')->withPivot(['funktion_id', 'abteilung'])->withTimestamps();
    }
}
