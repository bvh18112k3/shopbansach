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

            margin-top: 15px;
        }

        #flush-collapseFour {
            margin-top: 10px;
        }

        .form {
            margin: 20px 0;
        }

        span {
            color: red;
        }

        a {
            text-decoration: none;
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
            <h1>Thông Tin Đơn Hàng</h1>
        </div>
        <div class="col-2">
            <span class="hotline">0967124921</span><br>
            <span>Hotline</span>
        </div>
    </div>
    <div class="content row">
        <form class="row" method="post" action="{{route('addOrder')}}">
            @csrf
            <div class="left-content col-8">
                <div class="shipping-type box-content">
                    <div class="title">
                        <h2>Phương thức vận chuyển</h2>
                    </div>
                    <div class="content-box">
                        @php $a = 1 @endphp
                        <div class="accordion" id="accordionExample">
                            @foreach($shipping as $ship)

                                <div class="item">
                                    <div class="">
                                        <input id="ship{{$a}}" type="radio" class="form-check-input collapsed"
                                               value="{{$ship->id}}"
                                               name="shipping_method_id"
                                               data-bs-toggle="collapse" data-bs-target="#collapse{{$ship->id}}"
                                               aria-expanded="false"
                                               aria-controls="collapse{{$ship->id}}">
                                        {{$ship->name}}
                                    </div>
                                    <div id="collapse{{$ship->id}}" class="accordion-collapse collapse"
                                         data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            {!! $ship->detail !!}
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $fee[]= $ship->fee;

                                    $a++;
                                @endphp
                            @endforeach

                            @error('shipping_method_id')
                            <p style="color: red">{{$message}}</p>
                            @enderror


                        </div>
                    </div>
                    <div class="payment-type box-content" style="background-color: white " aria-hidden="false">
                        <div class="title">
                            <h2>Phương thức thanh toán</h2>
                        </div>
                        <div class="content-box">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                @foreach($payment as $pay)
                                    <div class="item">
                                        <input type="radio" name="payment_method_id" value="{{$pay->id}}"
                                               class="form-check-input collapsed"
                                               data-bs-toggle="collapse"
                                               data-bs-target="#flush-collapse{{$pay->id}}" aria-expanded="false"
                                               aria-controls="flush-collapse{{$pay->id}}">
                                        {{$pay->name}}
                                        <div id="flush-collapse{{$pay->id}}" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                {!! $pay->description !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @error('payment_method_id')
                                <p style="color: red">{{$message}}</p>
                                @enderror
                            </div>

                        </div>

                    </div>
                    <div class="other-info  box-content">
                        <div class="title ">
                            <h2>Thông tin khác</h2>
                        </div>
                        <div class="content-box">
                            <div class="gift-box" ng-hide="paymode=='tragop'" aria-hidden="false">
                                <div class="box-inline">
                                    <div class="item">
                                        <input type="checkbox" name="hi" id="gift" class="form-check-input collapsed"
                                               data-bs-toggle="collapse"
                                               data-bs-target="#flush-collapseFour" aria-expanded="false"
                                               aria-controls="flush-collapseFour" value="Có"> Gói thành quà
                                        <div id="flush-collapseFour" class="accordion-collapse collapse"
                                             data-bs-parent="#accordionFlushExample">
                                        <textarea name="loichuc" class="form-control" cols="20" rows="5"
                                                  placeholder="Lời chúc"></textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="takenote-box">
                                <div class="checkbox">
                                    Ghi chú cho Bookbuy
                                </div>
                                <br>
                                <div class="takenote">
                                <textarea name="note" ng-model="invoice.RequestInfo" placeholder="Thông tin ghi chú"
                                          class="form-control" cols="20" rows="5" aria-multiline="true"
                                          aria-invalid="false"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-content">
                        <div class="title ">
                            <h2>Mã giảm giá/ ưu đãi</h2>
                        </div>
                        <div class="content-box">
                            <div class="item">
                                <input type="text" class="form-control-sm" name="discount" id="discount">
                                <a class="btn btn-danger" id="apdung">Áp dụng</a>
                            </div>
                            <p id="hien"></p>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="box-content row">
                    @foreach($address as $ad )
                        <i>Giao hàng đến</i>
                        <p>Họ tên người nhận hàng: <b>{{$ad->order_name}}</b></p>
                        <p>Địa chỉ: {{$ad->order_address}}</p>
                        <p>{{$ad->order_phone}} - {{$ad->order_email}}</p>
                        <input type="hidden" name="address_id" value="{{$ad->id}}">
                    @endforeach

                </div>

                <div class="box-content row">
                    <div class="col-10">
                        <p>Đơn hàng({{$count}} sản phẩm)</p>
                    </div>
                    <div class="col-2">
                        <a href="" class="btn btn-light">Sửa</a>
                    </div>
                    @php
                        $sum_money = 0;
                    @endphp
                    @foreach($carts as $cart)
                        <div class="row">
                            @php
                                $sum_money += $cart->sum_money;
                            @endphp

                            <div class="col-9">
                                {{$cart->quantity}}x <a
                                    href="{{route('book-detail', ['id'=> $cart->book_id, 'author_id'=>$cart->Book->author_id])}}">{{$cart->Book->name}}</a>
                            </div>
                            <div class="col-3">
                                {{price_format($cart->sum_money)}}đ
                            </div>
                        </div>
                        @if($check == 1)
                            <input type="hidden" name="book_id" value="{{$cart->book_id}}">
                            <input type="hidden" name="sum_quantity" value="{{$cart->quantity}}">
                            <input type="hidden" name="cart_id" value="{{$cart->id}}">
                        @endif
                    @endforeach
                    <div class="row">
                        <div class="col-9">
                            <p>Tiền hàng</p>
                        </div>
                        <div class="col-3">
                            {{price_format($sum_money)}}đ
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            <p>Phí vận chuyển </p>
                        </div>
                        <div class="col-3">
                            <p id="fee">chưa có</p>
                        </div>
                    </div>
                    <div class="row" style="display: none" id="qua">
                        <div class="col-9">
                            <p>Phí gói quà </p>
                        </div>
                        <div class="col-3">
                            <p id="fee">20.000đ</p>
                        </div>
                    </div>
                    <div class="row" style="display: none" id="dc">
                        <div class="col-9">
                            <p>Giảm giá</p>
                        </div>
                        <div class="col-3">
                            <p id="dis"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                            Tổng cộng
                        </div>
                        <div class="col-3">
                            <p id="total_money">{{price_format($sum_money)}}đ</p>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="check" value="{{$check}}">
            <input type="hidden" name="order_status" value="0">
            <input type="hidden" id="sum_money" name="total_money" value="{{$sum_money}}">
            <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
            <input type="hidden" id="tiengg" name="giamgia" value="0">


            <div class="submit">
                <button class="btn btn-success" type="submit">Đặt mua</button>
            </div>
            @php
                foreach ($discount as $dis){
                    $discounts[] = $dis;

                }
            @endphp
        </form>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var x = @php echo json_encode($sum_money);@endphp;
    var y = x;
    var fee = @php echo json_encode($fee);@endphp;
    var discount = @php echo json_encode($discounts)@endphp;


    $(document).ready(function () {
        var gift = 0;

        $("#ship1").click(function () {
            if (x == y) {
                x = x + fee[0];
                $("#sum_money").val(x);
                $("#total_money").text(new Intl.NumberFormat("de-DE").format(x) + 'đ');
                $("#fee").text(new Intl.NumberFormat("de-DE").format(fee[0]) + 'đ');
            } else {
                x = x - fee[1];
                x = x + fee[0];
                $("#sum_money").val(x);
                $("#total_money").text(new Intl.NumberFormat("de-DE").format(x) + 'đ');
                $("#fee").text(new Intl.NumberFormat("de-DE").format(fee[0]) + 'đ');
            }


        });
        $("#ship2").click(function () {
            if (x == y) {
                x = x + fee[1];
                $("#sum_money").val(x);
                $("#total_money").text(new Intl.NumberFormat("de-DE").format(x) + 'đ');
                $("#fee").text(new Intl.NumberFormat("de-DE").format(fee[1]) + 'đ');
            } else {
                x = x - fee[0];
                x = x + fee[1];
                $("#sum_money").val(x);
                $("#total_money").text(new Intl.NumberFormat("de-DE").format(x) + 'đ');
                $("#fee").text(new Intl.NumberFormat("de-DE").format(fee[1]) + 'đ');
            }


        });
        var a = 1;
        $("#gift").click(function () {
            if (a == 1) {
                x = x + 20000;
                $("#sum_money").val(x);
                $("#total_money").text(new Intl.NumberFormat("de-DE").format(x) + 'đ');
                $("#qua").show();
                a++;
            } else {
                x = x - 20000;
                $("#sum_money").val(x);
                $("#total_money").text(new Intl.NumberFormat("de-DE").format(x) + 'đ');
                $("#qua").hide();
                a = 1;
            }
            if(gift == 0){
                $("#chuc").show();

                gift = 1;
                $("#flush-collapseFour").show();
            }
            else{
                $("#chuc").hide();

                gift = 0;
                $("#flush-collapseFour").hide();

            }

        });
        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + (today.getDate());
        var date1 = new Date(date);
        var o = 0;
        var t = 0;

        var l = discount.length;

        $("#apdung").click(function () {
            console.log($("#discount").val());
            for (var dis of discount) {
                if ($("#discount").val() === dis.code) {
                    var date2 = new Date(dis.start_day);
                    var date3 = new Date(dis.end_day);
                    if (date1 >= date2 && date1 <= date3) {
                        if (o === 0) {
                            $("#hien").text(`Chúc mừng bạn được giảm ${dis.discount}% `);
                            $("#hien").css("color", "green")
                            $("#dc").show();
                            let d = o = (y * dis.discount) / 100;
                            x = x - d;
                            $("#sum_money").val(x);
                            $("#total_money").text(new Intl.NumberFormat("de-DE").format(x) + 'đ');
                            $("#dis").text('-' + new Intl.NumberFormat("de-DE").format(d) + 'đ');
                            $("#tiengg").val(d);

                        } else {
                            x = x + o;
                            $("#hien").text(`Chúc mừng bạn được giảm ${dis.discount}% `);
                            $("#hien").css("color", "green")
                            $("#dc").show();
                            let d = o = (y * dis.discount) / 100;
                            x = x - d;
                            $("#sum_money").val(x);
                            $("#total_money").text(new Intl.NumberFormat("de-DE").format(x) + 'đ');
                            $("#dis").text('-' + new Intl.NumberFormat("de-DE").format(d) + 'đ');
                            $("#tiengg").val(d);
                        }

                    } else {
                        if (o != 0) {
                            x = x + o;
                            o = 0;
                            $("#dc").hide();
                            $("#sum_money").val(x);
                            $("#total_money").text(new Intl.NumberFormat("de-DE").format(x) + 'đ');
                            $("#hien").text(`Mã giảm giá đã hết hạn`);
                            $("#hien").css("color", "red");
                            $("#tiengg").val(0);

                        } else {
                            $("#hien").text(`Mã giảm giá đã hết hạn`);
                            $("#hien").css("color", "red");
                            $("#tiengg").val(0);
                        }
                    }
                    break;

                } else {
                    t++;
                }

            }
            if (t == l) {
                if (o != 0) {
                    x = x + o;
                    o = 0;
                    $("#dc").hide();
                    $("#sum_money").val(x);
                    $("#total_money").text(new Intl.NumberFormat("de-DE").format(x) + 'đ');
                    $("#hien").text(`Mã giảm giá không đúng`);
                    $("#hien").css("color", "red");
                    $("#tiengg").val(0);
                } else {
                    $("#hien").text(`Mã giảm giá không đúng`);
                    $("#hien").css("color", "red");
                    $("#tiengg").val(0);
                }
            }
            t=0;
        })

        // $("#apdung").click(function () {
        //     discount.map((dis, index) => {
        //         if ($("#discount").val() === dis.code) {
        //             var date2 = new Date(dis.start_day);
        //             var date3 = new Date(dis.end_day);
        //             if (date1 >= date2 && date1 <= date3) {
        //                 if (o === 0) {
        //                     console.log(x);
        //                     $("#hien").text(`Chúc mừng bạn được giảm ${dis.discount}% `);
        //                     $("#hien").css("color", "green")
        //                     $("#dc").show();
        //                     let d = o = (y * dis.discount) / 100;
        //                     x = x - d;
        //                     $("#sum_money").val(x);
        //                     $("#total_money").text(new Intl.NumberFormat("de-DE").format(x) + 'đ');
        //                     $("#dis").text('-' + new Intl.NumberFormat("de-DE").format(d) + 'đ');
        //                     console.log(o);
        //                 } else {
        //                     x = x + o;
        //                     console.log(x);
        //                     $("#hien").text(`Chúc mừng bạn được giảm ${dis.discount}% `);
        //                     $("#hien").css("color", "green")
        //                     $("#dc").show();
        //                     let d = o = (y * dis.discount) / 100;
        //                     x = x - d;
        //                     $("#sum_money").val(x);
        //                     $("#total_money").text(new Intl.NumberFormat("de-DE").format(x) + 'đ');
        //                     $("#dis").text('-' + new Intl.NumberFormat("de-DE").format(d) + 'đ');
        //
        //                 }
        //
        //             } else {
        //                 if (o != 0) {
        //                     x = x + o;
        //                     $("#sum_money").val(x);
        //                     $("#total_money").text(new Intl.NumberFormat("de-DE").format(x) + 'đ');
        //                     $("#hien").text(`Mã giảm giá đã hết hạn`);
        //                     $("#hien").css("color", "red");
        //                 } else {
        //                     $("#hien").text(`Mã giảm giá đã hết hạn`);
        //                     $("#hien").css("color", "red");
        //                 }
        //             }
        //
        //         }
        //
        //     })
        // })


    });

</script>
</body>
</html>

