<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public $fillable = ['name', 'surname'];
    public function books(){
        return $this->hasMany('App\Book');
    } 

}
