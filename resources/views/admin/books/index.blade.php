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
            <th>Nhà xuất bản</th>
            <th>Ngày xuất bản</th>
            <th>Số trang</th>
            <th>Trọng lượng</th>
            <th>Kích thước</th>
            <th>Giá bán</th>
            <th>Số lượng</th>
            <th>Trạng thái</th>
            <th>Giảm giá</th>
            <th>Tác giả</th>
            <th >Action</th>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td><img src="{{asset($item->image)}}" width="100px" alt=""></td>
                    <td>{{$item->publishing_company}}</td>
                    <td>{{$item->publishing_year}}</td>
                    <td>{{$item->pages}}</td>
                    @if($item->weight >=1000)
                        <td>{{($item->weight)/1000}}kg</td>
                    @else
                        <td>{{($item->weight)}}g</td>
                    @endif
                    <td>{{$item->size}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->status}}</td>
                    <td>{{$item->discount}}%</td>
                    <td>{{$item->Author->name}}</td>
                    <td><a href="{{route('admin.books.edit', $item->id)}}" class="btn btn-primary">Sửa</a>

                        <button class="btn btn-danger" onclick="if(confirm('Bạn muốn xóa')){
                        document.getElementById('item--{{$item->id}}').submit();
                    }">Xóa</button>
                        <form action="{{route('admin.books.destroy', $item->id)}}" id="item--{{$item->id}}" method="post">
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
