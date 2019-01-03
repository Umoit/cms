<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpiderTarget extends Model
{
     protected $fillable = [
        'name', 'url','rule','child_rule'
    ];
}
