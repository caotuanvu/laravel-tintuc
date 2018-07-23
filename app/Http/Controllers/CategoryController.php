<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public function getList()
    {
        $category = Category::paginate(5);
        return view('admin.category.list',['category' => $category]);
    }

    public function getAdd()
    {
        return view('admin.category.add');
    }



    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                 'name' => 'required|unique:category,ten|min:3|max:50'],
            [
                 'name.required' => 'Tên không được để rỗng !',
                 'name.unique'   => 'Tên đã tồn tại !',
                 'name.min'      => 'Độ dài ký tự phải từ 3 đến 50 ký tự !',
                 'name.max'      => 'Độ dài ký tự phải từ 3 đến 50 ký tự !',
            ]);

        $category = new Category();
        $category->ten        = $request->name;
        $category->tenkhongdau = optimizeTitle($request->name);

        $category->save();
        return redirect('admin/category/add')->with('notification', 'Đã thêm mới thành công');
    }

    public function getEdit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit',['category' => $category]);
    }

    public function postEdit(Request $request,$id)
    {
        $category = Category::find($id);
        $this->validate($request,
            [
                'name' => 'required|unique:category,ten|min:3|max:50'],
            [
                'name.required' => 'Tên không được để rỗng !',
                'name.unique'   => 'Tên đã tồn tại !',
                'name.min'      => 'Độ dài ký tự phải từ 3 đến 50 ký tự !',
                'name.max'      => 'Độ dài ký tự phải từ 3 đến 50 ký tự !',
            ]
        );
        $category->ten         = $request->name;
        $category->tenkhongdau = optimizeTitle($request->name);
        $category->save();

        return redirect('admin/category/edit/'.$id)->with('notification','Đã chỉnh sửa thành công');
    }

    public function getDelete($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('admin/category/list')->with('notification','Đã xóa thành công');
    }
}
