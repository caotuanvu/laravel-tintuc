<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    //
    public function getList()
    {
        $slider    = Slider::paginate(2);

        return view('admin.slider.list',['slider' => $slider]);
    }

    public function getAdd()
    {
        return view('admin.slider.add');
    }



    public function postAdd(Request $request)
    {
       $this->validate($request,
           [
               'name'    => 'required|min:3|max:100|unique:slider,name',
               'link'    => 'required|min:3|max:100|unique:slider,link',
               'noidung' => 'required|min:3|max:1000',
               'hinhanh'  => 'required|mimes:jpeg,bmp,png,jpg|max:2048',
           ],
           [
               'name.required' => 'Tên không được rỗng',
               'name.min' => 'Tên phải có độ dài ký tự phải từ 3 đến 100 !',
               'name.max' => 'Tên phải có độ dài ký tự phải từ 3 đến 100 !',
               'name.unique' => 'Tên đã bị trùng !',
               'link.required' => 'Link không được rỗng !',
               'link.unique' => 'Link đã tồn tại !',
               'link.min' => 'Link phải có độ dài từ 3 đến 100 !',
               'link.max' => 'Link phải có độ dài từ 3 đến 100 !',
               'hinhanh.required' => 'Hinhanh không được rỗng !',
               'hinhanh.mimes' => 'Phần mở rộng không hợp lệ (jpg,png,bmp,jpeg) !',
               'hinhanh.max' => 'Kíc thước ảnh quá lớn !',
               'noidung.max' => 'Nội dung phải có độ dài từ 3 đến 100 !',
               'noidung.min' => 'Nội dung phải có độ dài từ 3 đến 100 !',
               'noidung.required' => 'Nội dung không được rỗng !',
           ]);
       $slider = new Slider();
       $slider->name = $request->name;
       $slider->link = $request->link;
       $slider->content = $request->noidung;
       if($request->hasFile('hinhanh'))
       {
           $file     = $request->file('hinhanh');
           $fileName = $file->getClientOriginalName();
           $name = str_random(4).'_'.$fileName;
           while (file_exists('upload/slider/'.$name))
           {
               $name = str_random(4).'_'.$fileName;
           }
           $file->move('upload/slider',$name);
           $slider->image = $name;
       }
       $slider->save();
       return redirect('admin/slider/add')->with('notification','Đã thêm slider thành công !');

    }

    public function getEdit($id)
    {
       $slider = Slider::find($id);
       return view('admin.slider.edit',['slider' => $slider]);
    }

    public function postEdit(Request $request,$id)
    {
      $slider = Slider::find($id);

        $this->validate($request,
            [
                'name'    => 'required|min:3|max:100',
                'link'    => 'required|min:3|max:100',
                'noidung' => 'required|min:3|max:1000',
            ],
            [
                'name.required' => 'Tên không được rỗng',
                'name.min'      => 'Tên phải có độ dài ký tự phải từ 3 đến 100 !',
                'name.max'      => 'Tên phải có độ dài ký tự phải từ 3 đến 100 !',
                'link.required' => 'Link không được rỗng !',
                'link.min'      => 'Link phải có độ dài từ 3 đến 100 !',
                'link.max'       => 'Link phải có độ dài từ 3 đến 100 !',
                'noidung.max'       => 'Nội dung phải có độ dài từ 3 đến 100 !',
                'noidung.min'       => 'Nội dung phải có độ dài từ 3 đến 100 !',
                'noidung.required'       => 'Nội dung không được rỗng !',
            ]);
        $slider->name = $request->name;
        $slider->link = $request->link;
        $slider->content = $request->noidung;
        if($request->hasFile('hinhanh'))
        {
            $file     = $request->file('hinhanh');
            $fileName = $file->getClientOriginalName();
            $name = str_random(4).'_'.$fileName;
            while (file_exists('upload/slider/'.$name))
            {
                $name = str_random(4).'_'.$fileName;
            }
            $file->move('upload/slider',$name);

            @unlink('upload/slider/'.$slider->image);

            $slider->image = $name;
        }
        $slider->save();
        return redirect('admin/slider/edit/'.$id)->with('notification','Đã sửa thành công !');
    }

    public function getDelete($id)
    {
      $slider = Slider::find($id);
        if(file_exists('upload/tintuc/'.$slider->image))
        {
            @unlink('upload/slider/'.$slider->image);
        }
      $slider->delete();
        return redirect('admin/slider/list')->with('notification','Đã xóa thành công !');
    }
}
