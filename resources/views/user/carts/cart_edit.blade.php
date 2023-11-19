@extends('user.layout.master')
@section('content')
    @foreach($cart as $c)
        <div class="container-fluid">
            <h1>Cập nhật giỏ hàng</h1>
            <form action="{{route('cart.update', $c->id)}}" method="post">
                @csrf

                <input type="hidden" name="id" value="{{$c->id}}">
                <input type="hidden" name="user_id" value="{{$c->user_id}}">
                <input type="hidden" name="price" value="{{$c->Book->price - ($c->Book->price*$c->Book->discount)/100}}">
                <div>
                    <label for="">Tên sách</label>
                    <input type="text" value="{{$c->Book->name}}" disabled class="form-control">
                </div>
                <div>
                    <label for="">Giá</label>
                    <input type="text"
                           value="{{number_format($c->Book->price - ($c->Book->price*$c->Book->discount)/100, 0, '', '.')}}"
                           disabled class="form-control" >
                </div>
                <div>
                    <label for="">Số lượng</label>
                    <input type="number" value="{{$c->quantity}}" min="1" name="quantity" class="form-control">
                </div>
                <br>
                <button type="submit" class="btn btn-success">Cập nhật</button>
            </form>
        </div>
    @endforeach
@endsection
