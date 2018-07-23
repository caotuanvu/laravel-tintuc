<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 05-Jul-18
 * Time: 4:00 PM
 */


 function removeSpace($value){
    $value   = trim($value);
    $value   = preg_replace("#(\s)+#imsU",' ', $value);
    $value   = preg_replace("#(\s)+#imsU", '-', $value);
    $value   = preg_replace("#(-)+#", '-', $value);
    return $value;
}

 function textConversion($value)
 {
     $value = mb_strtolower($value, 'UTF-8');

     $characterA = '#(à|ả|ã|á|ạ|ă|ằ|ẳ|ẵ|ắ|ặ|â|ầ|ẩ|ẫ|ấ|ậ)#imsU';
     $replaceA = 'a';
     $value = preg_replace($characterA, $replaceA, $value);

     $characterD = '#(đ|Đ)#imsU';
     $replaceD = 'd';
     $value = preg_replace($characterD, $replaceD, $value);

     $characterE = '#(è|ẻ|ẽ|é|ẹ|ê|ề|ể|ễ|ế|ệ)#imsU';
     $replaceE = 'e';
     $value = preg_replace($characterE, $replaceE, $value);

     $characterI = '#(ì|ỉ|ĩ|í|ị)#imsU';
     $replaceI = 'i';
     $value = preg_replace($characterI, $replaceI, $value);

     $charaterO = '#(ò|ỏ|õ|ó|ọ|ô|ồ|ổ|ỗ|ố|ộ|ơ|ờ|ở|ỡ|ớ|ợ)#imsU';
     $replaceCharaterO = 'o';
     $value = preg_replace($charaterO, $replaceCharaterO, $value);

     $charaterU = '#(ù|ủ|ũ|ú|ụ|ư|ừ|ử|ữ|ứ|ự)#imsU';
     $replaceCharaterU = 'u';
     $value = preg_replace($charaterU, $replaceCharaterU, $value);

     $charaterY = '#(ỳ|ỷ|ỹ|ý)#imsU';
     $replaceCharaterY = 'y';
     $value = preg_replace($charaterY, $replaceCharaterY, $value);

     $charaterSpecial = '#(,|$)#imsU';
     $replaceSpecial = '';
     $value = preg_replace($charaterSpecial, $replaceSpecial, $value);

     return $value;
 }
 function optimizeTitle($value){
    $value = removeSpace($value);
    $value = textConversion($value);

    return $value;
}

function showErrors($value,$class='col-md-7')
{
    $xhtml = '';
    if(count($value) > 0){
        $xhtml = '<div class="alert alert-danger '.$class.'"><ul>';
        foreach ($value->all() as $error)
        {
            $xhtml .= '<li style="list-style: none;">'.$error.'</li>';
        }
        $xhtml .= '</ul></div>';
    }
      return $xhtml;

}
function showNotification($class='col-md-7')
{
    $xhtml = '';
    if(session('notification')){
        return $xhtml = '<div class="alert alert-success '.$class.' notification">'.session('notification').'<i class="fas fa-times float-right icon-notifi"></i></div>';
    }
}
function focusText($str,$tukhoa)
{
 return str_replace($tukhoa,"<span style='color: red;'>".$tukhoa."</span>",$str);
}