@extends('admin.layout.master')
@section('content')
    <div class="container-fluid">
        <form action="{{route('admin.payments.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="">Phương thức thanh toán</label>
                <input type="text" value="{{old('name')}}" name="name" class="form-control">
                @error('name')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Mô tả</label>
                <textarea name="description" class="form-control" id="" cols="30" rows="10">{{old('description')}}</textarea>
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
