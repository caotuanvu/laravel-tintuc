<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loaitin;
use App\Category;
class LoaitinController extends Controller
{
    //
    public function getList()
    {
        $loaitin   = Loaitin::paginate(5);

        return view('admin.loaitin.list',['loaitin' => $loaitin]);
    }

    public function getAdd()
    {
        $category = Category::pluck('id','ten');
        return view('admin.loaitin.add',['category'=>$category]);
    }



    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'category' => 'required',
                'name'     => 'required|unique:loaitin,ten|min:3|max:100'
            ],
            [
               'category.required'  => 'Thể loại không được để rỗng',
               'name.required'      => 'Tên không được để rỗng !',
               'name.unique'        => 'Tên đã tồn tại !',
               'name.min'           => 'Độ dài ký tự phải từ 3 đến 50 ký tự !',
               'name.max'           => 'Độ dài ký tự phải từ 3 đến 50 ký tự !',
            ]);

        $loaitin = new Loaitin();
        $loaitin->ten = $request->name;
        $loaitin->tenkhongdau = optimizeTitle($request->name);
        $loaitin->id_category = $request->category;
        $loaitin->save();
        return redirect('admin/loaitin/add')->with('notification','Bạn đã thêm một loại tin thành công !');
    }

    public function getEdit($id)
    {
       $loaitin  = Loaitin::find($id);
       $category = Category::all();
       return view('admin/loaitin/edit',['loaitin' => $loaitin, 'category' => $category]);
    }

    public function postEdit(Request $request,$id)
    {
        $loaitin = Loaitin::find($id);

        $this->validate($request,
            [
                'category' => 'required',
                'name'     => 'required|unique:loaitin,ten|min:3|max:100'
            ],
            [
                'category.required'  => 'Thể loại không được để rỗng',
                'name.required'      => 'Tên không được để rỗng !',
                'name.unique'        => 'Tên đã tồn tại !',
                'name.min'           => 'Độ dài ký tự phải từ 3 đến 50 ký tự !',
                'name.max'           => 'Độ dài ký tự phải từ 3 đến 50 ký tự !',
            ]);

        $loaitin->ten = $request->name;
        $loaitin->tenkhongdau = optimizeTitle($request->name);
        $loaitin->id_category =  $request->category;
        $loaitin->save();

        return redirect('admin/loaitin/edit/'.$id)->with('notification', "Đã chỉnh sửa thành công !");

    }

    public function getDelete($id)
    {
       $loaitin = Loaitin::find($id);
       $loaitin->delete();

       return redirect('admin/loaitin/list')->with('notification', "Đã xóa thành công !");
    }
}
