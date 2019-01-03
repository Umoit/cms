<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bbsTopic extends Model
{
    protected $fillable = [
        'category_id', 'title','type','rate','user_id','nsfw','content','tag_id','upvotes','downvotes','comments_number','approved_at'
    ];

    // public function replies()
    // {
    //     return $this->hasMany(Reply::class);
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
