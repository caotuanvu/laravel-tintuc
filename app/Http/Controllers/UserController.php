<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    //
    public $checklogin;
    public function getList()
    {
        $user = User::paginate(5);
        return view('admin.user.list',['user' => $user]);
    }
    public function getEdit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',['user' => $user]);
    }

    public function postEdit(Request $request,$id)
    {
        $user = User::find($id);
        $this->validate($request,
            [
               'name'         => 'required|min:3|max:20',
            ],
            [
              'name.required' => 'Tên không được rỗng !',
              'name.min'      => 'Độ dài tên phải từ 3 đến 50 ký tự !',
              'name.max'      => 'Độ dài tên phải từ 3 đến 50 ký tự !',
            ]);

            if($request->changePass == "on")
            {
                $this->validate($request,
                    [
                        'password' => 'required|min:3|max:50',
                        'passwordAgain' => 'min:3|max:50|same:password',
                    ],
                    [
                        'password.max'    => 'Độ dài password phải từ 3 đến 50 ký tự !',
                        'passwordAgain.min'    => 'Độ dài password phải từ 3 đến 50 ký tự !',
                        'passwordAgain.max'    => 'Độ dài password phải từ 3 đến 50 ký tự !',
                        'password.min'    => 'Độ dài password phải từ 3 đến 50 ký tự !',
                        'password.required'    => 'Password không được rỗng !',
                        'passwordAgain.same'    => 'Password nhập lại không đúng !',
                    ]);
                $user->password = encrypt($request->password);
            }
        $user->name =  $request->name;
        $user->level =  $request->level;
        $user->save();
      return redirect('admin/user/edit/'.$id)->with('notification','Bạn đã thay đổi thông tin thành công !');
    }
    public function getAdd()
    {
        return view('admin.user.add');
    }

    public function postAdd(Request $request)
    {
          $this->validate($request,
              [
                   'name'  => 'required|min:3|max:50',
                   'email' => 'required|min:3|max:50|unique:user,email',
                   'password' => 'required|min:3|max:50',
                   'passwordAgain' => 'min:3|max:50|same:password',
              ],
              [
                  'name.required' => 'Tên không được rỗng !',
                  'name.min'      => 'Độ dài tên phải từ 3 đến 50 ký tự !',
                  'name.max'      => 'Độ dài tên phải từ 3 đến 50 ký tự !',
                  'email.min'    => 'Độ dài email phải từ 3 đến 50 ký tự !',
                  'email.required'    => 'Email không được rỗng !',
                  'email.max'    => 'Độ dài email phải từ 3 đến 50 ký tự !',
                  'email.unique'    => 'Email đã tồn tại !',
                  'password.max'    => 'Độ dài password phải từ 3 đến 50 ký tự !',
                  'passwordAgain.min'    => 'Độ dài password phải từ 3 đến 50 ký tự !',
                  'passwordAgain.max'    => 'Độ dài password phải từ 3 đến 50 ký tự !',
                  'password.min'    => 'Độ dài password phải từ 3 đến 50 ký tự !',
                  'password.required'    => 'Password không được rỗng !',
                  'passwordAgain.same'    => 'Password nhập lại không đúng !',
              ]);
          $user = new User();
          $user->name = $request->name;
          $user->email = $request->email;
          $user->password = bcrypt($request->password);
          $user->level = $request->level;
          $user->save();
          return redirect('admin/user/add')->with('notification','Đã thêm mới thành công !');
    }

    public function getDelete($id)
    {
           $user = User::find($id);
           $user->delete();
           return redirect('admin/user/list')->with('notification','Bạn đã xóa thành công !');
    }
    public function getLoginAdmin()
    {
        return view('login');
    }
    public function postLoginAdmin(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|min:3|max:50',
                'password' => 'required|min:3|max:50',
            ],
            [
                'email.min'    => 'Độ dài email phải từ 3 đến 50 ký tự !',
                'email.required'    => 'Email không được rỗng !',
                'email.max'    => 'Độ dài email phải từ 3 đến 50 ký tự !',
                'password.required'    => 'Password không được rỗng !',
                'password.min'    => 'Độ dài password phải từ 3 đến 50 ký tự !',
                'password.max'    => 'Độ dài password phải từ 3 đến 50 ký tự !',
            ]);

        if (Auth::attempt(['email'=>$request->email,'password' =>$request->password])) {
            return redirect('admin/category/list');
        }
         else{
            return redirect('admin/user/login')->with('notification', 'Đăng nhập thất bại vui lòng kiểm tra email hoặc password' );
        }
    }
    public function Logout()
    {
        Auth::logout();
        return redirect('admin/user/login');
    }

}
