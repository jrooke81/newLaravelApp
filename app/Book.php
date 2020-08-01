<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function catagories(){
        return $this->belongsToMany('App\Catagory');
    }
}
