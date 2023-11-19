@extends('user.layout.master')
@section('content')
    <style>
        .title-head {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
    <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100"
         data-appear-top-offset="600" data-parallax="scroll"
         data-image-src="{{asset('font_end/images/parallax/bgparallax-07.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-innerbannercontent">
                        <h1>Đơn hàng của bạn</h1>
                        <ol class="tg-breadcrumb">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('orderUser', Auth::user()->id)}}">Đơn hàng của bạn</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-sectionspace tg-haslayout">
        <div class="container">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="head-title clearfix row">
                    <h1 class="col-10 title-head" >Chi tiết đơn hàng #{{$order->id}}</h1>
                    <span class="note order_date col-2">Ngày tạo: {{date('d/m/Y', strtotime($order->created_at))}}
					</span>
                </div>
                <div class="row">
                    <div class="payment_status col-6">
                        <span class="note">Trạng thái thanh toán:</span>
                        <i class="status_pending">
                            <em>
                            <span class="span_pending"
                                  style="color: red"><strong><em>
                                        @if($order->PaymentMethod->id == 1)
                                            Chưa thanh toán
                                        @else
                                            {{$order->PaymentMethod->name}}
                                        @endif

                                    </em></strong></span>
                            </em>
                        </i>
                    </div>
                    <div class="shipping_status col-6">
                        <span class="note">Trạng thái đơn hàng:</span>
                        <b style="color:#212B25" class="span_">
                            @if($order->order_status === 0)
                                Đang chờ xác nhận
                            @elseif($order->order_status === 1)
                                Đang chuẩn bị hàng
                            @elseif($order->order_status === 2 )
                                Đang vận chuyển
                            @else
                                Đơn hàng đã được giao
                            @endif
                        </b>
                    </div>
                </div>
                <div class="row card-group " style="margin-top: 20px">
                    <div class="col-xs-12 col-sm-12 col-md-6 body_order card">
                        <div class="card-body">
                            <h2 class="title-head">Địa chỉ giao hàng</h2>
                            <div class="address box-des">
                                <p><strong>{{$order->Address->order_name}}</strong></p>
                                Địa chỉ:
                                {{$order->Address->order_address}}

                                <p>Số điện thoại: {{$order->Address->order_phone}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 body_order card">
                        <div class="card-body">
                            <h2 class="title-head">
                                Thanh toán
                            </h2>
                            <div class="box-des">
                                <p>
                                    {{$order->PaymentMethod->name}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 body_order card">
                        <div class="card-body">
                            <h2 class="title-head">
                                Ghi chú
                            </h2>
                            <div class="box-des">
                                <p>
                                    @if(!empty($order->note))
                                        {{$order->note}}
                                    @else
                                        Không có ghi chú
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <table class="table " style="margin-top: 20px">
                        <thead class="thead-default theborder">
                        <tr>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderDetail as $od)
                            <tr>
                                <td class="link" data-title="Tên">
                                    <img style="width: 100px" src="{{asset($od->Book->image)}}" alt="">
                                    <a class="title_order" href="{{route('book-detail', ['id'=>$od->Book->id, 'author_id'=>$od->Book->Author->id])}}"
                                       title="{{$od->Book->name}}">{{$od->Book->name}}</a>
                                </td>
                                <td data-title="Giá" class="numeric">
                                    {{price_discount($od->Book->price, $od->Book->discount)}}
                                     VND
                                    <del>{{price_format($od->Book->price)}} VND</del>
                                </td>
                                <td data-title="Số lượng" class="numeric">{{$od->sum_quantity}}</td>
                                <td data-title="Tổng" class="numeric">{{number_format($od->sum_money)}} VND</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-8">
                    </div>
                    <div class="col-4 row ">
                        <div class="col-4">
                            <p>Khuyến mại</p>
                        </div>
                        <div class="col-8">
                            <p>{{price_format($order->giamgia)}} VND</p>
                        </div>
                        <div class="col-4">
                            <p>Phí vận chuyển</p>
                        </div>
                        <div class="col-8">
                            <p>{{price_format($order->ShippingMethod->fee)}} VND({{$order->ShippingMethod->name}})</p>
                        </div>
                        <div class="col-4">
                            <p>Tổng tiền</p>
                        </div>
                        <div class="col-8">
                            <p>{{price_format($order->total_money)}} VND</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
