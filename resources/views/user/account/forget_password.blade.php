<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('font_end/css/login.css')}}">

</head>
<body>
<section>
    <img src="{{asset('font_end/images/bg.jpg')}}" alt="" class="bg">
    <div class="login">
        <form action="{{route('forget')}}" method="post" >
            @csrf
            <h2>Nhập email để nhận mật khẩu</h2>
            <div class="inputBox">
                <label for="">Email</label>
                <input type="text" name="email" value="{{old('email')}}" >
                @error('email')
                <p style="color: red">{{$message}}</p>
                @enderror
                @if(session('error')) <p style="color: red">{{session('error')}}</p> @endif
            </div>
            <div class="inputBox">
                <input type="submit" value="Nhận mật khẩu" id="btn">
            </div>
            <div class="group">
                <a href="{{route('login')}}">Đăng nhập</a>
                <a href="{{route('signUp')}}">Tạo tài khoản</a>
            </div>
        </form>
    </div>
</section>
</body>
</html>
