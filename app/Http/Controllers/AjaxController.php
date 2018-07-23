<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Loaitin;

class AjaxController extends Controller
{
    //
    public function getTintuc($id)
    {
        $category = Loaitin::where('id_category',$id)->get();

        if(!empty($category))
        {
            foreach ($category as $ct)
            {
                 echo '<option value="'.$ct->id.'">'.$ct->ten.'</option>';
            }
        }

    }
}
