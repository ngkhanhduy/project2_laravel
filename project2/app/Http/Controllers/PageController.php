<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Categorys;
use App\Models\News;
use App\Models\User;

class PageController extends Controller
{
    //

    function __construct()
    {
        
        $cate = Categorys::find(1);
        $category = $cate->category;
        if(Auth::check()){
            $user = Auth::user();
            view()->share('user', $user);
        }
        view()->share('category', $category);
    }

    public function home()
    {
        return view('page.home');
    }

    public function contact()
    {
        return view('page.contact');
    }

    public function getCategory($id)
    {
        $category = Categorys::find($id);
        $new = News::where('Category_Id', $id)->paginate(3);
        return view('page.category', ['new' => $new], ['cate' => $category]);
    }

    public function getCategoryparent($id)
    {   
        $category = Categorys::find($id);
        $new = Categorys::where('Parent_Category_Id', $id )
                ->join('news', 'categorys.Id', '=', 'news.Category_Id')
                ->paginate(5);
        return view('page.category', ['new' => $new], ['cate' => $category]);
    }

    public function getNew($id){
        $new = News::find($id);
		$hot_new = News::all()->random(4);
		$re_new= News::where('Category_Id',$new->Category_Id)->get();
		return view('page.new',['hot_new'=>$hot_new,'re_new'=>$re_new,'new'=>$new]);
    }

    public function getUserInfor(){
        return view('page.infor');
    }

    public function postUserInfor(Request $request,$id){
        $user = User::find($id);
        $user->Name = $request->name;
        if($request->password != null){
            $user->Password = bcrypt($request->password);
        };
        $user->save();
        return redirect('infor/'.$id)->with('thongbao','Chỉnh sửa thành công');
    }

    public function getRegister(){
        return view('page.register');
    }

    public function postRegister(Request $request){
        $this->validate($request,[
            'email'=>'required|unique:users,email',
            'name'=>'required',
            'password'=>'required|min:6|max:20'
        ],[
            'name.required'=>'Bạn chưa nhập tên',
            'email.unique'=>'email đã đăng kí với tài khoản khác',
            'email.required'=>'Bạn chưa nhập Email',
            'pasword.required'=>'Bạn chưa nhập pasword',
            'pasword.min'=>'mật khẩu phải có độ dài từ 6 đến 20 kí tự',
            'pasword.max'=>'mật khẩu phải có độ dài từ 6 đến 20 kí tự',
        ]);

        $user = new User;
        $user->Name = $request->name;
        $user->Email = $request->email;
        $user->Password = bcrypt($request->password);
        $user->Role = 'Viewer';
        $user->save();
        echo 'dang ki thanh cong';
    }

    public function getLogin(){
        return view('page.login');
    }

    public function postLogin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:6|max:20'
        ],[
            'email.unique'=>'Bạn chưa nhập Email',
            'pasword.required'=>'Bạn chưa nhập pasword',
            'pasword.min'=>'mật khẩu phải có độ dài từ 6 đến 20 kí tự',
            'pasword.max'=>'mật khẩu phải có độ dài từ 6 đến 20 kí tự',
        ]);

        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect('/home');
        }else{
            return redirect('/login')->with('thongbao','Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/home');
    }

    public function Search(Request $request){
        $keyword = $request->keyword; 
		$new = News::where('Title','like',"%$keyword%")->orwhere('Summary','like',"%$keyword%")->orwhere('Content','like',"%$keyword%")->paginate(5);
		return view('page.search', ['new' => $new], ['key' => $keyword]);
    }
    
}
