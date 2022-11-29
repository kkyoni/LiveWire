<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organisations extends Model
{
    use Notifiable, SoftDeletes;
    protected $table = 'organisation';
    protected $fillable = ['titel', 'synonyme', 'adresse', 'ort_id', 'email', 'telefon', 'fax', 'web', 'uid', 'fb', 'wkonr', 'status_id'];

    public function status_list()
    {
        return $this->hasOne('App\Models\Status', 'id', 'status_id');
    }

    public function ort_list()
    {
        return $this->hasOne('App\Models\City', 'id', 'ort_id');
    }

    public function themen_detalis()
    {
        return $this->belongsToMany(Topic::class, 'organisation_themen', 'organisation_id', 'themengebiet_id')->withPivot(['funktion_id', 'abteilung'])->withTimestamps();
    }

    public function person_detalis()
    {
        return $this->belongsToMany(Person::class, 'person_organisation', 'organisation_id', 'person_id')->withPivot(['funktion_id', 'abteilung'])->withTimestamps();
    }

    public function user_detalis()
    {
        return $this->belongsToMany(User::class, 'user_organisation', 'organisation_id', 'user_id')->withTimestamps();
    }
}
