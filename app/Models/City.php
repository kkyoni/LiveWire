<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use Notifiable, SoftDeletes;
    protected $table = 'ort';
    protected $fillable = ['plz', 'bezeichnung', 'bundesland_id', 'land_id'];

    public function land_list()
    {
        return $this->hasOne('App\Models\Country', 'id', 'land_id');
    }

    public function bundesland_list()
    {
        return $this->hasOne('App\Models\Federalstate', 'id', 'bundesland_id');
    }
}
