<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Admin extends Authenticatable
{
    static function getName($id){
        return Admin::where('id',$id)->value('name');
    }
}
