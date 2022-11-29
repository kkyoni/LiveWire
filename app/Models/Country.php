<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Country extends Model
{
    use Notifiable;
    protected $table = 'tx_laender';
    protected $fillable = ['IEBStaatNr', 'Bezeichnung', 'Bezeichnung_en', 'ISO', 'iban', 'EU', 'Arbeitserlaubnis', 'Aufenthaltserlaubnis'];
}
