<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientNotification extends Model 
{

    protected $table = 'client_notifications';
    public $timestamps = true;

    public function clients()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

}