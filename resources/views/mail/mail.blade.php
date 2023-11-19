<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid row">
    <div >
        <table>

            <tr>
                <td colspan="2">
                    <div>
                        Thân gửi quý khách {{$user->name}}
                        <p>Cám ơn quý khách! Quý khách đã đặt hàng thành công tại Book Library. Vui lòng không phản hồi
                            (reply) email này.</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <b>Thông tin chi tiết đơn hàng:</b>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Mã đơn hàng: </b>{{$order->id}}
                </td>
                <td>
                    <b>Thời gian:</b>{{date_format($order->created_at,"d/m/Y H:i") }}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div>
                        <b>Email: nhận đơn hàng: </b>
                        <p>{{$user->email}}</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div>
                        <b>Thông tin người nhận</b>
                        <p>Họ tên: {{$order->Address->order_name}}</p>
                        <p>Địa chỉ: {{$order->Address->order_address}}</p>
                        <p>
                            Điện thoại: {{$order->Address->order_phone}}
                        </p>


                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Phương thức thanh toán</b>
                    <p>{{$order->PaymentMethod->name}}</p>
                </td>
                <td>
                    <b>Phương thức vận chuyển</b>
                    <p>{{$order->ShippingMethod->name}}</p>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Gói quà</b>
                    <p>{{$order->gift}}</p>
                </td>
                <td>
                    <b>Lời chúc</b>
                    <p>{{$order->loichuc}}</p>
                </td>
            </tr>
        </table>
    </div>
    <div>
        <table border="1">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá bán TT</th>
                <th>Giá bán</th>
                <th>Số lượng</th>
                <th>Trọng lượng(gr)</th>
                <th>Thành tiền(VNĐ)</th>
            </tr>
            @php
                $a= 1;
                $sum_money = 0;
                $sum_weight = 0;
            @endphp
            @foreach($order_detail as $od)
                <tr>
                    <td>{{$a}}</td>
                    <td>{{$od->Book->name}}</td>
                    <td>{{$od->Book->price}} VNĐ</td>
                    <td>{{price_discount($od->Book->price, $od->Book->discount)}} VNĐ</td>
                    <td>{{$od->sum_quantity}}</td>
                    <td>{{$od->Book->weight}}</td>
                    <td>{{$od->sum_money}}</td>
                </tr>
                @php
                    $a++;
                    $sum_weight = $sum_weight + ($od->sum_quantity * $od->Book->weight);
                    $sum_money= $sum_money + $od->sum_money;
                @endphp
            @endforeach
        </table>
    </div>
    <div>
        <p>Trọng lượng:  {{$sum_weight}} g</p>
        <p>Tiền hàng: {{$sum_money}} VND</p>
        <p>Phí vận chuyển: {{$order->ShippingMethod->fee}} VND</p>
        <p>Giảm giá từ mã: {{price_format($order->giamgia)}} VND</p>
        <p>Tổng tiền {{price_format($order->total_money)}} VND</p>
    </div>
    <div class="text-center">
        <a href="btn btn-success">Quay về trang chủ</a>
    </div>
</div>
</body>
</html>
