<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name', 'slug', 'meta_description'
    ];

 	public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

}
