<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";
    protected $primaryKey = 'Id';

    public function category(){
        return $this->belongsTo('App\Models\Categorys','Category_Id','Id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','Author_Id','Id');
    }

    public function comment(){
        return $this->hasMany('App\Models\Comments','New_Id','Id');
    }
}
