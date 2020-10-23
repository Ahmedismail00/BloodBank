<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientPost extends Model 
{

    protected $table = 'client_post';
    public $timestamps = false;
    protected $fillable = array('client_id', 'favourite_post_id');

}