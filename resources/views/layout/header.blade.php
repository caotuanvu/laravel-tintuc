<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 11-Jul-18
 * Time: 2:40 PM
 */
?>
<div class="header">
     <div class="infoPage" style="min-height: 30px;">
          <div class="container">
               <ul class="list-inline">
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="#">Địa chỉ</a></li>
               </ul>
          </div>
     </div>

     <nav class="navbar navbar-expand-lg navbar-light bg-primary" style="height: 60px">
          <a class="navbar-brand">Laravel tin tức</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                         <a class="nav-link" href="pagehome">Trang chủ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" >Giới thiệu</a>
                    </li>


               <form class="form-inline my-2 my-lg-0" method="post" action="search">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Tìm kiếm tin tức.." aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0 text-danger" type="submit">Tìm kiếm</button>
               </form>
               </ul>
               <ul class="navbar-nav pull-right">

                    @if(!Auth::user())
                    <li class="nav-item">
                         <a class="nav-link" href="register">Dăng ký</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="login">Đăng nhập</a>
                    </li>
                    @else
                         <li>
                         <a id="navbarDropdown" class="nav-link" href="user" role="button">
                              {{ Auth::user()->name }} <span class="caret"></span>
                         </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="logout">Đăng suất</a>
                         </li>
                    @endif
               </ul>
          </div>
     </nav>
</div>
