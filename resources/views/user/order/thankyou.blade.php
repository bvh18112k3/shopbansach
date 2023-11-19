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
        #luuy{
            text-decoration: underline;
            font-weight: bold;
        }
        a{
            text-decoration: none;
        }
        img {
            margin: 50px 0;
        }
        li{
            line-height: 2em ;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="content row">
        <div class="col-3"></div>
        <div class="box-content col-6">
            <div>
                <img src="{{asset('font_end/images/logo.png')}}" class="rounded mx-auto d-block" alt="...">
            </div>
            <h6>Cảm ơn bạn đã mua hàng tại Book Library</h6>
            <div>
                <p>Mã số xác nhận đơn hàng của quý khách là {{$order->id}} </p>
            </div>
            <div>
                <p id="luuy">Quý khách lưu ý:</p>
                <p>Email xác nhận đơn hàng, thay cho việc gọi điện đã được gửi đến email của
                    Quý khách , trong Hộp thử đến(Inbox), hoặc Spam, JunkFolder.
                    Vui lòng chọn Đây không phải thư rác/ Report not spam nếu email vào Spam</p>
                <p>
                    Nếu có thắc mắc hay cần sự hỗ trợ, quý khác vui lòng gọi cho chúng tôi số 0967124921
                    hoặc gửi email về địa chỉ :
                </p>
                <p>
                    <a href="{{route('home')}}">Book Library</a> luôn mong muốn mang lại sự hài lòng cho quý khách.

                </p>
                <p>
                    Trân trọng cảm ơn!
                </p>
                <h6 style="color: #0d6efd ">Book Library</h6>

            </div>
            @if($order->payment_method_id == 2)
                <div>
                    <b>Khách hàng ở trong nước có thể chuyển khoản qua các ngân hàng sau:</b>
                    <h6>1. Ngân Hàng Quân Đội Việt Nam MB Bank</h6>
                    <p>Người nhận : Bùi Văn Huy</p>
                    <p>Số tài khoản: 0967124921</p>
                </div>
                <div>
                    <b>Chú ý: </b>
                    <li>Sau khi chuyển khoản, bạn vui lòng nhắn tin hoặc email thông báo việc chuyển tiền và số tài khoản của bạn
                        để tiện trong việc kiểm tra. BookStore sẽ nhanh chóng gửi hàng ngay sau khi nhận đươc thông báo chuyển tiền
                    </li>
                    <li>Việc gửi tiền có thể mất từ 1-2 ngày. Ngay khi phía Ngân hàng thông báo việc gửi tiền thành công, BookStore sẽ thực hiện chuyển đơn hàng đến Quý khách  </li>
                </div>
            @else
                <div>
                    <p>{!! $order->PaymentMethod->description !!}</p>
                </div>
            @endif
        </div>
        <div class="col-3"></div>


    </div>
</div>
</body>
</html>
