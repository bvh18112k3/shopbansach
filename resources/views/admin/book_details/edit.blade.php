@extends('admin.layout.master')
@section('content')
    <div class="container-fluid">
        <form action="{{route('admin.book_details.update', $bookDetail->id)}}" method="post"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="">Tên sách</label>
                <select name="book_id" class="form-control">
                    @foreach($book as $b)
                        @if($b->id == $bookDetail->book_id)
                            <option value="{{$b->id}}" selected>{{$b->name}}</option>
                        @else
                            <option value="{{$b->id}}">{{$b->name}}</option>
                        @endif
                    @endforeach

                </select>
                @error('book_id')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Thể loại sách</label>
                <select name="book_type_id" id="" class="form-control">
                    @foreach($book_type as $bt)
                        @if($bt->id == $bookDetail->book_type_id)
                            <option value="{{$bt->id}}" selected>{{$bt->name}}</option>
                        @else
                            <option value="{{$bt->id}}">{{$bt->name}}</option>
                        @endif
                    @endforeach
                </select>
                @error('book_type_id')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection

