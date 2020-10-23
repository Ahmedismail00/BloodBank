<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientGovernorate extends Model 
{

    protected $table = 'client_governorate';
    public $timestamps = false;
    protected $fillable = array('governorate_id');

}