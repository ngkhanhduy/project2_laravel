<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //

    public function postComment(Request $request,$id){
        $comment = new Comments;
        $comment->Content = $request->content;
        $comment->User_Id = Auth::user()->Id;
        $comment->New_Id = $id;
        $comment->save();
        return redirect('new/'.$id);
    }

}
