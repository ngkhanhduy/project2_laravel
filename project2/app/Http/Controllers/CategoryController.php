<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorys;

class CategoryController extends Controller
{
    //

    public function getListCategory(){
        $category = Categorys::all();
        return view('admin.category.list',['cate'=>$category]);
    }

    public function getAddCategory(){
        $category = Categorys::all();
        return view('admin.category.add',['cate'=>$category]);
    }

    public function postAddCategory(Request $request){
        $this->validate($request,[
            'Name'=>'required|unique:categorys,name|min:3|max:100'
        ],[
            'Name.unique'=>'Thể loại đã tồn tại',
            'Name.required'=>'Bạn chưa nhập thể loại',
            'Name.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 kí tự',
            'Name.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 kí tự',
        ]);

        $category = new Categorys;
        $category->Name = $request->Name;
        $category->Parent_Category_Id = $request->category_parent;
        $category->save();

        return redirect('admin/category/add')->with('thongbao','Thêm thể loại thành công');
    }

    public function getEditCategory($id){
        $list_category = Categorys::all();
        $category= Categorys::find($id);
        return view('admin.category.edit',['cate'=>$category],['list_cate'=>$list_category]);
    }

    public function postEditCategory(Request $request,$id){
        $this->validate($request,[
            'Name'=>'required|min:3|max:100'
        ],[
            'Name.required'=>'Bạn chưa nhập thể loại',
            'Name.min'=>'Tên thể loại phải có độ dài từ 3 đến 100 kí tự',
            'Name.max'=>'Tên thể loại phải có độ dài từ 3 đến 100 kí tự',
        ]);

        $category = Categorys::find($id);
        $category->Name = $request->Name;
        $category->Parent_Category_Id = $request->category_parent;
        $category->save();
        return redirect('admin/category/edit/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getDeleteCategory($id){
        $category = Categorys::find($id);
        $category->Delete();
        return redirect('admin/category/list')->with('thongbao','Bạn đã xóa thành công');
    }
}
