<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function childs(){
    	return $this->hasMany('App\Category', 'child_id');
    }
}
