<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Client extends Authenticatable
{
    use HasRoles;

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('phone', 'email', 'blood_type_id', 'name', 'd_o_b', 'last_donation_date', 'city_id', 'api_token', 'password','pin_code');
    protected $hidden = [ 'password', 'remember_token','api_token','pin_code' ];
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    public function bloodType()
    {
        return $this->belongsToMany('App\Models\BloodType');
    }

    public function donationRequest()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function cities()
    {
        return $this->belongsToMany('App\Models\City');
    }
    public function governorate()
    {
        return $this->belongsToMany('App\Models\Governorate');
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }

}
