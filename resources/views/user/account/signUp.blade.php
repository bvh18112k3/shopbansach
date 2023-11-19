<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('font_end/css/login.css')}}">
</head>
<body>
<section>
    <img src="{{asset('font_end/images/bg.jpg')}}" alt="" class="bg">
    <div class="signUp">
        <form action="{{route('register')}}" class="row" method="post" enctype="multipart/form-data">
            @csrf
            <h2>Đăng kí</h2>
            <div class="inputBox col-6" >
                <label for="">Họ và tên </label>
                <input type="text" name="name" value="{{old('name')}}" >
                @error('name')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="inputBox col-6" >
                <label for="">Email</label>
                <input type="email" name="email"value="{{old('email')}}" >
                @error('email')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="inputBox col-6">
                <label for="">Số điện thoại</label>
                <input type="text" name="phone_number"value="{{old('phone_number')}}" >
                @error('phone_number')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="inputBox col-6">
                <label for="">Mật khẩu</label>
                <input type="password" name="password" value="{{old('password')}}">
                @error('password')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="inputBox col-6">
                <label for="">Nhập lại mật khẩu</label>
                <input type="password" name="password_confirmation" value="{{old('password')}}">
                @error('password')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="inputBox col-6">
                <label for="">Địa chỉ</label>
                <input type="text" name="address" value="{{old('address')}}" >
                @error('address')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <input type="hidden" value="Khách hàng" name="role">
            <div class="inputBox">
                <label for="">Avatar</label>
                <input type="file" name="image" class="form-control" >
                @error('image')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div class="inputBox">
                <input type="submit" value="Đăng kí" id="btn">
            </div>
            <div class="group">
                <a href="">Quên mật khẩu</a>
                <a href="{{route('login')}}">Đăng nhập</a>
            </div>
        </form>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
