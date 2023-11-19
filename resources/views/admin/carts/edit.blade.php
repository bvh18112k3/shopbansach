@extends('admin.layout.master')
@section('content')
    <div class="container-fluid">
        <form action="{{route('admin.book_types.update', $book_type->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="">Thể loại sách</label>
                <input type="text" value="{{$book_type->name}}" name="name" class="form-control">
                @error('name')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection

