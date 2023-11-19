@extends('user.layout.master')
@section('content')
    <style>
        h1{
            font-size: 40px;
            font-weight: bold;
            text-transform: uppercase;
        }
        ul{
            list-style: none;
        }
        li{
            list-style: none;
        }
        form{
            margin: 0;
            padding: 0;
        }
    </style>
   <div  class="tg-sectionspace tg-haslayout ">
       <div class="container">
           <div class="row">
               <div class="col-4">
                   <h1>trang tài khoản</h1>
                   <strong>Xin chào, <span>{{Auth()->user()->name}}</span>!</strong>
                   <ul>
                       <li><a href="">Thông tin tài khoản</a></li>
                       <li><a href="{{route('orderUser', ['user'=>Auth()->user()->id])}}">Đơn hàng của bạn</a></li>
                       <li><a href="{{route('updatepass')}}">Đổi mật khẩu</a></li>
                       <li>
                           <form method="POST" action="http://127.0.0.1:8000/logout">
                               @csrf
                               <a class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out" href="http://127.0.0.1:8000/logout" onclick="event.preventDefault();
                                                this.closest('form').submit();">Đăng xuất</a>
                           </form>
                       </li>
                   </ul>
               </div>
               <div class="col-6">
                   <h1>thông tin tài khoản</h1>
                   <div>
                       <img src="{{asset(Auth()->user()->image)}}" alt="">
                       <p><strong>Họ tên: </strong>{{Auth()->user()->name}}</p>
                       <p><strong>Email: </strong>{{Auth()->user()->email}}</p>
                       <p><strong>Địa chỉ: </strong>{{Auth()->user()->address}}</p>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
