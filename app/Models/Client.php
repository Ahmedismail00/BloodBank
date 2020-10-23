<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('phone', 'email','password','blood_type_id', 'name', 'd_o_b', 'last_donation_date', 'city_id','api_token');

    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function donationRequest()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }
    public function cities()
    {
        return $this->belongsTo('App\Models\City');
    }
    protected $hidden = [
        'password','api_token'
    ];

}