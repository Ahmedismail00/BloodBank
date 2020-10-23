<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model 
{

    protected $table = 'notifications';
    public $timestamps = true;
    protected $fillable = array('title', 'content');

    public function donation_request()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

}