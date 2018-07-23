<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Category;
use App\Slider;
use App\Loaitin;
use App\Tintuc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class PagesController extends Controller
{
    public function __construct()
    {
        $category = Category::all();
        $slide   = Slider::all();
        view()->share('category',$category);
        view()->share('slide',$slide);

    }

    public function pagehome( )
    {
        return view('pages.homePage');
    }
    public function loaitin($tenkhongdau,$id)
    {
        $loaitin = Loaitin::find($id);
        $tintuc   = Tintuc::where('id_loaitin',$id)->paginate(5);
       return view('pages.loaitin',['tintuc' => $tintuc, 'loaitin' => $loaitin]);
    }
    public function tintuc($id)
    {
        $tintuc      = Tintuc::find($id);
        $tinNoibat   = Tintuc::where('noibat',1)->take(4)->get();
        $tinLienquan = Tintuc::where('id_loaitin',$tintuc->id_loaitin)->take(4)->get();

        return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinNoibat,'tinlienquan'=>$tinLienquan]);
    }
    public function getLogin()
    {
        return view('pages.login');
    }
    public function postLogin(Request $request)
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
            return redirect('pagehome.html');
        }
        else{
            return redirect('login')->with('notification', 'Đăng nhập thất bại vui lòng kiểm tra email hoặc password' );
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('pagehome');
    }

    public function getUser()
    {
        $user  = Auth::user();
        return view('pages.user',['user'=>$user]);
    }
    public function postUser(Request $request, $id)
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
            $user->password = Hash::make($request->password);
        }
        $user->name =  $request->name;
        $user->save();
        return redirect('user')->with('notification','Bạn đã thay đổi thông tin thành công !');
    }

    public function getRegisterUser()
    {
       return view('pages.register');
    }
    // auto auth can het
    public function postRegisterUser(Request $request, $id)
    {

    }

    public function seachTintuc(Request $request)
    {
        $tukhoa   = $request->search;
        $tintuc   = Tintuc::where('tieude','like',"%$tukhoa%")->orWhere('tomtat','like',"%$tukhoa%")->orWhere('noidung','like',"%$tukhoa%")->take(20)->paginate(3);
        return view('pages.search',['tukhoa' => $tukhoa,'tintuc' => $tintuc]);
    }

}
