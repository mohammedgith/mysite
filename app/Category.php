<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
class Category extends Model
{
    
  
    protected $fillable = ['parent_id', 'name'];

    public function childs()
    {
    	return $this->hasMany(Category::class, 'parent_id');
    }

    public function parents()
    {
    	return $this->belongsTo(Category::class, 'parent_id');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function post(){
        return $this->hasMany(Post::class);
    }
}