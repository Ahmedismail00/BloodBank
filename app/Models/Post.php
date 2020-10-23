<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'image', 'content');

    public function categories()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

}