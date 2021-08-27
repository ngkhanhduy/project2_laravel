<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class AdminController extends Controller
{
    //

    public function getListUser()
    {
        $user = User::all();
        return view('admin.user.list', ['user' => $user]);
    }

    public function getEditUser($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    public function postEditUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->Role = $request->role;
        $user->save();
        return redirect('admin/user/edit/' . $id)->with('thongbao', 'Sửa thành công');
    }

    public function getDeleteUser($id)
    {
        $user = User::find($id);
        $user->Delete();
        return redirect('admin/user/list')->with('thongbao', 'Bạn đã xóa thành công');
    }

    public function getAdminLogin()
    {
        return view('admin.layout.login');
    }

    public function postAdminLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6|max:20'
        ], [
            'email.unique' => 'Bạn chưa nhập Email',
            'pasword.required' => 'Bạn chưa nhập pasword',
            'pasword.min' => 'mật khẩu phải có độ dài từ 6 đến 20 kí tự',
            'pasword.max' => 'mật khẩu phải có độ dài từ 6 đến 20 kí tự',
        ]);

        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password, 'Role' => 'Admin'])) {
            return redirect('admin/new/list');
        } else if (Auth::attempt(['email' => $email, 'password' => $password, 'Role' => 'Author'])) {
            $id = Auth::user()->Id;
            return redirect('author/new/list/' . $id);
        } else if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $id = Auth::user()->Id;
            return redirect('admin/login')->with('thongbao', 'Bạn không được phép đăng nhập trang này');
        } else {
            return redirect('admin/login')->with('thongbao', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function getAdminLogout()
    {
        Auth::logout();
        return redirect('admin/login');
    }

    public function getAdminRegister()
    {
        return view('admin.layout.register');
    }

    public function postAdminRegister(Request $request)
    {
        $user = new User;
        $user->Name = 'Khanh Duy';
        $user->Email = $request->email;
        $user->Password = bcrypt($request->password);
        $user->Role = 'Admin';
        $user->save();
        echo 'dang ki thanh cong';
    }
}
