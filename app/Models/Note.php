<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use Notifiable, SoftDeletes;
    protected $table = 'notizen';
    protected $fillable = ['text', 'user_id'];

    public function user_list()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
