@extends('admin.layout.master')
@push('css')
    <link href="{{asset('be/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <table class="table table-bordered" id="dataTable">
            <thead>
            <th>Tên sách</th>
            <th>Ảnh sách</th>
            <th>Thể loại sách</th>
            <th >Action</th>
            </thead>
            <tbody>
            @foreach($book as $item)
                <tr>
                    <td>
                        {{$item->Book->name}}
                    </td>
                    <td><img src="{{asset($item->Book->image)}}" width="150px" alt=""></td>
                    <td>
                        {{$item->BookType->name}}
                    </td>
                    <td><a href="{{route('admin.book_details.edit', $item->id)}}" class="btn btn-primary">Sửa</a>

                        <button class="btn btn-danger" onclick="if(confirm('Bạn muốn xóa')){
                        document.getElementById('item--{{$item->id}}').submit();
                    }">Xóa</button>
                        <form action="{{route('admin.book_details.destroy', $item->id)}}" id="item--{{$item->id}}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('script')
    <!-- Page level plugins -->
    <script src="{{asset('be/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('be/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('be/js/demo/datatables-demo.js')}}"></script>
@endpush
