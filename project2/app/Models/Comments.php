<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = "comments";
    protected $primaryKey = 'Id';

    public function new(){
        return $this->belongsTo('App\Models\News','New_Id','Id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','User_Id','Id');
    }
}
