<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavouritePost extends Model 
{

    protected $table = 'favourite_posts';
    public $timestamps = true;
    protected $fillable = array('title', 'image', 'content', 'category_id');

    public function categories()
    {
        return $this->belongsTo('App\Models\Category');
    }

}