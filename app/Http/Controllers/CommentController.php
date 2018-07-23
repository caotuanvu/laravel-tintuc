<?php

namespace App\Http\Controllers;

use App\Tintuc;
use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    //
    public function getDelete($id,$IdLoaitin,$idTintuc)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('admin/tintuc/edit/'.$IdLoaitin.'/'.$idTintuc)->with('notification','Đã xóa comment thành công !');
    }
    public function comment($idTintuc, Request $request)
    {
        $tintuc   = Tintuc::find($idTintuc);
          $this->validate($request,
              ['comment' => 'required|min:3'],
              [
                  'comment.required' => 'Comment không được rỗng !',
                  'comment.min'      => 'Độ dài ít nhất phải 3 ký tự !',
              ]);
          $comment = new Comment();
          $comment->noidung = $request->comment;
          $comment->id_tintuc = $idTintuc;
          $comment->id_user   = Auth::user()->id;
          $comment->save();
          return redirect('tintuc/'.$idTintuc.'/'.$tintuc->tieudekhongdau.'.html')->with('notification','Bạn đã bình luận cho bài viết !');
    }

}
