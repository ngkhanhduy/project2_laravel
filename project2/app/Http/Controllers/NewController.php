<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\News;
use App\Models\User;


class NewController extends Controller
{
    //

    public function getlistNewbyAuthorId($id){
        $user = User::find($id);
        $new = $user->new;
        $id = Auth::user()->Id;
        return view('author.new.list',['new'=>$new]);
    }

    public function getListNew(){
        $new = News::all();
        return view('admin.new.list',['new'=>$new]);
    }

    public function getListCommentById($id){
        $new = News::find($id);
        $comment = $new->comment;
        if(Auth::user()->Role == 'Admin'){
            return view('admin.comment.list',['comment'=>$comment]);
        }else{
            return view('author.comment.list',['comment'=>$comment]);
        }
        
    }

    public function getAddNew(){
        $category = Categorys::find(1);
        $category1 = $category->category;
        return view('author.new.add',['cate'=>$category1]);
    }

    public function postAddNew(Request $request){
        $category = Categorys::find(1);
        $category1 = $category->category;
        $new = new News;
        $new->Title = $request->title;
        $new->Summary = $request->summary;
        $new->Content = $request->content;
        $new->Category_Id = $request->categoryid;
        $new->Author_Id = Auth::user()->Id;
        $new->save();
        return view('author.new.add',['cate'=>$category1]);
    }

    public function getEditNew($id){
        $new = News::find($id);
        $category = Categorys::all();
        if(Auth::user()->Role == 'Admin'){
            return view('admin.new.edit',['new'=>$new],['cate'=>$category]);
        }else{
            $category = Categorys::find(1);
            $category1 = $category->category;
            return view('author.new.edit',['new'=>$new],['cate'=>$category1]);
        }
    }

    public function postEditNew($id,Request $request){
        $new = News::find($id);
        
        if(Auth::user()->Role == 'Admin'){
            $new->Status = $request->status;
            $new->save();
            return redirect('admin/new/list');
        }else{
            $new->Title = $request->title;
            $new->Summary = $request->summary;
            $new->Content = $request->content;
            $new->Category_Id = $request->categoryid;
            $id1 = Auth::user()->Id;
            $new->save();
            return redirect('author/new/list/'.$id1);
        }

    }

    public function DeleteNew($id){
        $New = News::find($id);
        $user = Auth::user();
        $New->Delete();
        $id = $user->Id;
        if(Auth::user()->Role == 'Admin'){
            return redirect('admin/new/list');
        }else{
            return redirect('author/new/list/'.$id);
        }
    }
}
