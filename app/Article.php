<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'category_id', 'title','content','img','comments_number','admin_id'
    ];

    // public function replies()
    // {
    //     return $this->hasMany(Reply::class);
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    } 

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    static function getArticleByCat($id=0,$num=10){
        if ($id == 0) {
            return Article::latest('created_at')->take($num)->get();
        }else{
            return Article::where('parent_id',$id)->take($num)->get();

        }
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
