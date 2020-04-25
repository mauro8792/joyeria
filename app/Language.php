<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    

    public function products(){
        return $this->belongsToMany('App\Model\Product')
        ->withPivot('name','long_description','description');
    }
}
