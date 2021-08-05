<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;
use App\Tag;
class Tag extends Model
{

    protected $fillable = [
        'name'
    ];
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
