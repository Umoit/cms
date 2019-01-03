<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpiderJob extends Model
{
    protected $fillable = [
        'title', 'url','content','img','target_id'
    ];



 

    public function target()
    {
        return $this->belongsTo(SpiderTarget::class);
    } 


}
