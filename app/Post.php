<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'featured', 'category_id', 'slug'
    ];

    protected $dates = ['deleted_at'];

    // Accessor to mutate featured field in views
    public function getFeaturedAttribute ($featured)
    {
        return asset($featured);
    }

    public function tags ()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function category ()
    {
        return $this->belongsTo('App\Category');
    }
}
