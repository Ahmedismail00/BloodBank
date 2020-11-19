<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'image', 'content','category_id');
    protected $appends=['is_favourite'];

    public function getIsFavouriteAttribute()
    {
        $user = auth()->guard('client')->user()??auth()->$this->guard('web')->user();
        $favourite = $this->whereHas('favourites',function ($query) use ($user)
        {
            $query->where('client_post.client_id',$user->id);
            $query->where('client_post.post_id',$this->id);
        })->first();
        if($favourite)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Models\Client');
    }
    public function favourites()
    {
        return $this->belongsToMany('App\Models\Client');
    }

}
