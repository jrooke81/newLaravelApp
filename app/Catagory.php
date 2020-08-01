<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    public function books(){
        return $this->belongsToMany('App\Book');
    }
}
