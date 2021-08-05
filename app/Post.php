<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;
use App\Tag;
use App\user;
class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','description','content','image','category_id','deleted_at','user_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
        public function tags(){
            return $this->belongsToMany(Tag::class);
        }
        public function categories(){
            return $this->belongsToMany(Category::class);
        }

    public function hasTag($tagId){
        return in_array($tagId,$this->tags->pluck('id')->toArray());
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    // public function comments()
    // {
    //     return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    // }
    public function comments()
{
  return $this->hasMany(Comment::class);
}
}
