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
    <div class="login" style="height: 600px">
        <form action="{{route('updatePass')}}" method="post" >
            @csrf
            <h2>Đổi mật khẩu</h2>
            <div class="inputBox">
                <label for="">Mật khẩu cũ</label>
                <input type="password" name="password_old" value="{{old('password_old')}}">
                <input type="hidden" name="email" value="{{Auth()->user()->email}}">
                @error('password_old')
                <p style="color: red">{{$message}}</p>
                @enderror
                @if(session('error'))
                    <p style="color: red">{{session('error')}}</p>
                @endif
            </div>
            <div class="inputBox">
                <label for="">Mật khẩu mới</label>
                <input type="password" name="password" value="{{old('password')}}">
                @error('password')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="inputBox">
                <label for="">Nhập lại mật khẩu mới</label>
                <input type="password" name="password_confirmation" value="{{old('password')}}">
                @error('password')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="inputBox">
                <input type="submit" value="Đổi mật khẩu" id="btn">
            </div>
            <div class="group">
                <a href="{{route('forgetPass')}}">Quên mật khẩu</a>
                <a href="{{route('home')}}">Quay lại </a>
            </div>
        </form>
    </div>
</section>
</body>
</html>
