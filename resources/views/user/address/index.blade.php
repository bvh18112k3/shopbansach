<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background: #efefef;
        }

        .container {
            margin-top: 20px;
        }

        .title h1 {
            color: #5cb85c;
        }

        .header img {
            width: 250px;
        }

        .hotline {
            color: #1cc88a;
        }

        .box-content {
            margin-top: 25px;
            padding: 10px;
            background-color: white;
        }

        .box-content .title {
            text-align: center;

            padding: 5px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.25);
        }

        .title h2 {
            font-size: 20px;
            text-transform: uppercase;
        }

        .item {
            margin-bottom: 15px;
            margin-top: 15px;
        }

        .submit {
            text-align: center;

            margin-top: 15px;
        }

        form{
            margin-top:20px ;
        }

        span {
            color: red;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="header row">
        <div class="col-4">
            <img src="{{asset('font_end/images/logo.png')}}" alt="">
        </div>
        <div class="col-6 title">
            <h1>Xác nhận</h1>
        </div>
        <div class="col-2">
            <span class="hotline">0967124921</span><br>
            <span>Hotline</span>
        </div>
    </div>
    <div class="content row">


        <div class="col-3"></div>
        <div class="box-content col-6">
            <div class="title">
                <h2>Địa Chỉ Giao Hàng</h2>
            </div>
            @foreach($address as $ad)
                <form class="row" action="{{route('address')}}">
                    @if(isset($_GET['id']))
                        @php
                            $_SESSION['id'] = $_GET['id'];
                        @endphp
                    @elseif(isset($id))
                        @php
                            $_SESSION['id'] = $id;
                        @endphp
                    @endif
                    @if(isset($_SESSION['id']))
                        <input type="hidden" name="id" value="{{$_SESSION['id']}}">
                    @else
                        <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                    @endif
                        <input type="hidden" name="address_id" value="{{$ad->id}}">
                    <div class=" row">
                        <i>Giao hàng đến</i>
                        <p>Họ tên người nhận hàng: <b>{{$ad->order_name}}</b></p>
                        <p>Địa chỉ: {{$ad->order_address}}</p>
                        <p>{{$ad->order_phone}} - {{$ad->order_email}}</p>
                        <div>
                            <button class="btn btn-danger" type="submit">Giao đến địa chỉ này</button>
                            <a href="" class="btn btn-light">Sửa</a>
                        </div>
                    </div>
                </form>
            @endforeach
            <a href="{{route('addAddress')}}">Thêm địa chỉ giao hàng mới</a>
        </div>
        <div class="col-3"></div>


    </div>
</div>
</body>
</html>
