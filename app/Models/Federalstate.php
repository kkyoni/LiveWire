<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Federalstate extends Model
{
    use Notifiable, SoftDeletes;
    protected $table = 'bundesland';
    protected $fillable = ['bezeichnung', 'land_id'];

    public function land_list()
    {
        return $this->hasOne('App\Models\Country', 'id', 'land_id');
    }
}
