@extends('admin.layout.master')
@section('content')
    <div class="container-fluid">
        <form action="{{route('admin.book_details.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="">Tên sách</label>
                <select name="book_id" class="form-control">
                    <option value="">Chọn sách</option>
                @foreach($books as $book)
                    <option value="{{$book->id}}">{{$book->name}}</option>
                @endforeach
                 </select>
                @error('name')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Thể loại sách</label>
                <select name="book_type_id" id="" class="form-control">
                    <option value="">Chọn thẻ loại sách</option>
                    @foreach($book_type as $b)
                        <option value="{{$b->id}}">{{$b->name}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection
@push('script')
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endpush
