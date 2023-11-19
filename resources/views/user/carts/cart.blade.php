@extends('user.layout.master')
@section('content')

    <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100"
         data-appear-top-offset="600" data-parallax="scroll"
         data-image-src="{{asset('font_end/images/parallax/bgparallax-07.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-innerbannercontent">
                        <h1>Giỏ hàng của bạn</h1>
                        <ol class="tg-breadcrumb">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('cart', Auth::user()->id)}}">Giỏ hàng</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-sectionspace tg-haslayout">
        <div class="container">
            <table class="table ">
                <tr>
                    <th>STT</th>
                    <th>Tên sách</th>
                    <th>Ảnh sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th colspan="3">Action</th>

                </tr>
                @php $a = 1 @endphp

                @foreach($cart as $c)
                    <form action="{{route('getAddress')}}" id="items--{{$c->id}}" >
                        <input type="hidden" value="{{$c->id}}" name="id">
                    </form>
                        <tr>
                            <td>{{$a}}</td>
                            <td>
                                <a href="{{route('book-detail', ['id'=>$c->Book->id, "author_id"=>$c->Book->author_id])}}">{{$c->Book->name}}</a>
                            </td>
                            <td><img style="width: 200px;" src="{{asset($c->Book->image)}}" alt=""></td>
                            <td>{{price_discount($c->Book->price,$c->Book->discount)}}đ
                            </td>
                            <td>{{$c->quantity}}</td>
                            <td>{{price_format($c->sum_money)}}đ</td>
                            <td>
                                <a href="{{route('cart.edit', $c->id)}}" class="btn btn-success">
                                    Cập nhật
                                </a>

                            </td>
                            <td><button class="btn btn-danger" onclick="if(confirm('Bạn muốn xóa')){
                        document.getElementById('item--{{$c->id}}').submit();
                    }">Xóa
                                </button>
                                <form action="{{route('carts.destroy', $c->id)}}" id="item--{{$c->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form></td>
                            <td><button class="btn btn-primary" onclick="document.getElementById('items--{{$c->id}}').submit()">Đặt hàng</button></td>
                        </tr>

                    @php $a++ @endphp
                @endforeach
            </table>
            @if(empty($cart))
                <a href="{{route('home')}}">Tiếp tục mua hàng</a>
            @else
                <form action="{{route('getAddress')}}">
                    <button type="submit" class="btn btn-primary">Mua tất cả</button>
                </form>
            @endif
        </div>
    </div>
@endsection
