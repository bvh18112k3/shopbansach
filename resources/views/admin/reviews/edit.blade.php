@extends('admin.layout.master')
@section('content')
    <div class="container-fluid">
        <form action="{{route('admin.reviews.update', $review->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="">Nội dung bình luận</label>
                <input type="text" value="{{$review->name}}" name="name" class="form-control">
                @error('name')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Tên sách</label>
                <select name="book_id" id="" disabled >
                    <option value="{{$review->book_id}}" selected>{{$review->Book->name}}</option>
                </select>
                @error('book_id')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Người đánh giá </label>
                <select name="user_id" id="" disabled >
                    <option value="{{$review->user_id}}" selected>{{$review->User->name}}</option>
                </select>
                @error('user_id')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>

            <br>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection

