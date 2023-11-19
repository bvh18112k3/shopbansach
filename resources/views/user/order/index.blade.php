@extends('user.layout.master')
@section('content')
    <style>
        td {
            height: 45px;
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
                            <li><a href="{{route('orderUser', Auth::user()->id)}}">Đơn hàng</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-sectionspace tg-haslayout ">
        <div class="container">
            <table class="table table-striped-columns">
                <thead>
                <tr>
                    <th>Đơn hàng</th>
                    <th>Ngày mua</th>
                    <th>Địa chỉ</th>
                    <th>Giá trị đơn hàng</th>
                    <th>TT đơn hàng</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td><a href="{{route('orderDetail', ['order'=>$order->id])}}">#{{$order->id}}</a></td>
                        <td>{{date('d/m/Y', strtotime($order->created_at))}}</td>
                        <td>{{$order->Address->order_address}}</td>
                        <td>{{price_format($order->total_money)}}</td>
                        @if($order->order_status === 0)
                            <td>Đang chờ xác nhận</td>
                        @elseif($order->order_status === 1)
                            <td>Đang chuẩn bị hàng</td>
                        @elseif($order->order_status === 2 )
                            <td>Đang vận chuyển</td>
                        @else
                            <td>Đơn hàng đã được giao</td>
                        @endif
                        @if($order->order_status === 0)
                            <td>
                                <button class="btn btn-danger" onclick="if(confirm('Xác nhận hủy')){
                        document.getElementById('item--{{$order->id}}').submit();
                    }">Hủy
                                </button>
                                <form action="{{route('admin.orders.destroy', $order->id)}}" id="item--{{$order->id}}"
                                      method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        @elseif($order->order_status = 3)
                            @php
                                $reviewed = false;
                            @endphp

                            @foreach($reviews as $review)
                                @if($review->order_id == $order->id )
                                    @php
                                        $reviewed = true;
                                    @endphp
                                    <td>Bạn đã đánh giá rồi</td>
                                    @break
                                @endif
                            @endforeach
                            @if (!$reviewed)
                                <td><a href="{{route('review.create', ['order'=> $order->id, 'user'=>$order->user_id])}}">Đánh giá</a></td>
                            @endif
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
