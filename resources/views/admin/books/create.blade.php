@extends('admin.layout.master')
@section('content')
    <div class="container-fluid">
        <form action="{{route('admin.books.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="">Tên sách</label>
                <input type="text" value="{{old('name')}}" name="name" class="form-control">
                @error('name')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Ảnh sách</label>
                <input type="file" name="image" class="form-control">
                @error('image')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Nhà xuất bản</label>
                <input type="text" value="{{old('publishing_company')}}" name="publishing_company" class="form-control">
                @error('publishing_company')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Ngày xuất bản</label>
                <input type="date" value="{{old('publishing_year')}}" name="publishing_year" class="form-control">
                @error('publishing_year')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Mô tả</label>
                <textarea name="description" id="" cols="30" rows="10">{{old('description')}}</textarea>
                @error('description')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Số trang</label>
                <input type="number" value="{{old('pages')}}" name="pages" class="form-control">
                @error('pages')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Trọng lượng (g)</label>
                <input type="number" value="{{old('weight')}}" name="weight" class="form-control">
                @error('weight')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Kích thước</label>
                <input type="text" value="{{old('size')}}" name="size" class="form-control">
                @error('size')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Giá bán</label>
                <input type="number" value="{{old('price')}}" name="price" class="form-control">
                @error('price')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Số lượng</label>
                <input type="number" value="{{old('quantity')}}" name="quantity" class="form-control">
                @error('quantity')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <input type="hidden" value="Còn hàng" name="status" >
            <div>
                <label for="">Giảm giá (%)</label>
                <input type="number" value="{{old('discount')}}" name="discount" class="form-control">
                @error('discount')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">Tác giả</label>
                <select name="author_id" id="" class="form-control">
                    <option value="">Tên tác giả</option>
                    @foreach($author as $a)
                        <option value="{{$a->id}}">{{$a->name}}</option>
                    @endforeach
                </select>
                @error('author_id')
                <p style="color: red">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="">
                    Thể loại
                </label>
                @foreach($book_type as $bt)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$bt->id}}" id="flexCheckDefault" name="book_type[]">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{$bt->name}}
                        </label>
                    </div>
                @endforeach
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
