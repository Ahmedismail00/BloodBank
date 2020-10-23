<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model 
{

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('client_id','patient_name', 'patient_phone', 'city_id', 'hospital_name', 'blood_type_id', 'patient_age', 'bags_num', 'hospital_address', 'details','latitude','longitude');

    public function cities()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function blood_type()
    {
        return $this->hasOne('App\Models\BloodType');
    }

}