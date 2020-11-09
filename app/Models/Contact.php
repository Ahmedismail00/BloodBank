<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model 
{

    protected $table = 'contacts';
    public $timestamps = true;
    protected $fillable = array('name', 'email','message', 'phone', 'subject', 'tw_link', 'insta_link', 'facebook_link', 'client_id');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}