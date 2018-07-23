<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Loaitin;
use App\Tintuc;
use App\Comment;

class TintucController extends Controller
{
    //
    public function getList()
    {
        $tintuc = Tintuc::orderBy('id','DESC')->paginate(5);

        return view('admin/tintuc/list',['tintuc' => $tintuc]);
    }

    public function getAdd()
    {
        $category = Category::pluck('id','ten');
        $loaitin  = Loaitin::pluck('id','ten');
        return view('admin/tintuc/add',['category' => $category, 'loaitin' => $loaitin]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
              'category' => 'not_in:0',
              'tieude'   => 'required|min:3|unique:tintuc,tieude',
              'tomtat'   => 'required|min:10',
              'noidung'  => 'required|min:10|max:1000',
              'hinhanh'  => 'required|mimes:jpeg,bmp,png|max:2048',
            ],
            [
               'category.not_in'   => 'Bạn phải chọn thể loại !',
               'tieude.required'   => 'Vui lòng nhập tiêu để bài viết !',
               'tieude.min'        => 'Tiêu để bài viết quá ngắn, độ dài phải từ 3 ký tự trở lên !',
               'tieude.unique'     => 'Tiêu để đã tồn tại!',
               'tomtat.required'   => 'Vui lòng nhập tóm tắt để bài viết !',
               'tomtat.min     '   => 'Tóm tắt bài viết quá ngắn, độ dài phải từ 10 ký tự trở lên!',
               'noidung.required'  => 'Nội dung không được để rỗng!',
               'noidung.min'       => 'Nội dung bài viết quá ngắn, độ dài phải từ 10 ký tự trở lên !',
               'noidung.max'       => 'Nội dung chỉ dưới 1000 ký tự!',
               'hinhanh.required'  => 'Vui lòng chọn hình ảnh !',
               'hinhanh.mimes'     => 'Phần mở rộng hình ảnh không hợp lê !',
               'hinhanh.max'      => 'Kíc thước file quá lớn !',
            ]);
        $tintuc = new Tintuc();
        $tintuc->tieude = $request->tieude;
        $tintuc->tieudekhongdau = optimizeTitle($request->tieude);
        $tintuc->tomtat = $request->tomtat;
        $tintuc->noidung = $request->noidung;
        $tintuc->views  = 0;
        $tintuc->noibat = $request->noibat;
        $tintuc->id_loaitin = $request->loaitin;

        if($request->hasFile('hinhanh'))
        {
            $file       = $request->file('hinhanh');
            $orginName  = $file->getClientOriginalName();

            $name       = str_random(4).'_'. $orginName;
            // vòng lặp while kiểm tra điều kiện trước- nếu mà tên file tồn tại thì sẽ lặp
            while (file_exists('upload/tintuc/'.$name))
            {
                $name       = str_random(4). $orginName;
            }
            $file->move('upload/tintuc',$name);

            $tintuc->hinh = $name;
        }
        $tintuc->save();
        return redirect('admin/tintuc/add')->with('notification' , 'Bạn đã thêm thành công !');
    }
    public function getEdit($idLoaitin,$idTintuc)
    {
        $category = Category::pluck('id','ten');
        $loaitin  = Loaitin::find($idLoaitin);
        $tintuc   = Tintuc::find($idTintuc);
        $comment  = Comment::where('id_tintuc',$idTintuc)->paginate(5);
        return view('admin/tintuc/edit',['category' => $category, 'loaitin' => $loaitin,'tintuc' => $tintuc,'comment' => $comment ]);

    }

    public function postEdit(Request $request,$idLoaitin,$id)
    {
        $this->validate($request,
            [
                'category' => 'not_in:0',
                'tieude'   => 'required|min:3',
                'tomtat'   => 'required|min:10',
                'noidung'  => 'required|min:10|max:1000',
            ],
            [
                'category.not_in'   => 'Bạn phải chọn thể loại !',
                'tieude.required'   => 'Vui lòng nhập tiêu để bài viết !',
                'tieude.min'        => 'Tiêu để bài viết quá ngắn, độ dài phải từ 3 ký tự trở lên !',
                'tomtat.required'   => 'Vui lòng nhập tóm tắt để bài viết !',
                'tomtat.min     '   => 'Tóm tắt bài viết quá ngắn, độ dài phải từ 10 ký tự trở lên!',
                'noidung.required'  => 'Nội dung không được để rỗng!',
                'noidung.min'       => 'Nội dung bài viết quá ngắn, độ dài phải từ 10 ký tự trở lên !',
                'noidung.max'       => 'Nội dung chỉ dưới 1000 ký tự!',
            ]);
        $tintuc = Tintuc::find($id);
        $tintuc->tieude = $request->tieude;
        $tintuc->tieudekhongdau = optimizeTitle($request->tieude);
        $tintuc->tomtat = $request->tomtat;
        $tintuc->noidung = $request->noidung;
        $tintuc->views  = 0;
        $tintuc->noibat = $request->noibat;
        $tintuc->id_loaitin = $request->loaitin;


        if($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $orginName = $file->getClientOriginalName();
            $extends = $file->getClientOriginalExtension();
             $size = $file->getClientSize();
            if (!in_array($extends, ['jpg', 'png', 'jpeg'])) {
                return redirect("admin/tintuc/edit/{$idLoaitin}/{$id}")->with('notification', 'Phần mở rộng hình ảnh không hợp lệ !');
            } elseif ($size > 2000000) {
             return redirect("admin/tintuc/edit/{$idLoaitin}/{$id}")->with('notification', 'Kíc thước file quá lớn !');
            }

            $name       = str_random(4).'_'. $orginName;
            while (file_exists('upload/tintuc/'.$name))
            {
                $name       = str_random(4). $orginName;
            }
            $file->move('upload/tintuc',$name);
            @unlink('upload/tintuc/'.$tintuc->hinh);

            $tintuc->hinh = $name;
        }
        $tintuc->save();
        return redirect('admin/tintuc/edit/'.$idLoaitin.'/'.$id)->with('notification' , 'Bạn đã sửa thành công !');
    }
    public function getDelete($id)
    {
        $tintuc = Tintuc::find($id);
        if(file_exists('upload/tintuc/'.$tintuc->hinh))
        {
            @unlink('upload/tintuc/'.$tintuc->hinh);
        }

        $tintuc->delete();
        return redirect('admin/tintuc/list')->with('notification', 'Đã xóa thành công !');

    }

    public function postOrder(Request $request)
    {
      echo $request->sort;
    }
}
