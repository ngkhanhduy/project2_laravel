<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorys extends Model
{
    use HasFactory;
    protected $table = "categorys";
    protected $primaryKey = 'Id';

    public function category(){
        return $this->hasMany('App\Models\Categorys','Parent_Category_Id','Id');
    }

    public function new(){
        return $this->hasMany('App\Models\News','Category_Id','Id');
    }
}
