@extends('admin.layout.master')
@section('content')
    <div class="container-fluid">
        <form action="{{route('admin.authors.update', $author->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="">Tên tác giả</label>
                <input type="text" value="{{$author->name}}" name="name" class="form-control">
                @error('name')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Ảnh tác giả</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Vài nét vè tác giả</label>
                <textarea name="description" id="" cols="30" rows="10">{{$author->description}}</textarea>
                @error('description')
                <p style="color: red">{{$message}}</p>
                @enderror
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
