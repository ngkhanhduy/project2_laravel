<?php

namespace App\Http\Controllers;

use App\Models\Categorys;



class AjaxController extends Controller
{
    //
    public function getCategory($id)
    {
    	 $category = Categorys::find($id) ;
         foreach ($category->category as $cate) {
            echo "<option value='".$cate->Id."'>".$cate->Name."</option>"; 
            }
   }
}
