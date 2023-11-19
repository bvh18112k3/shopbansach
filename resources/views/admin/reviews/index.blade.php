@extends('admin.layout.master')
@push('css')
    <link href="{{asset('be/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <table class="table table-bordered" id="dataTable">
            <thead>
            <th>ID</th>
            <th>Nội dung</th>
            <th>Tên sách</th>
            <th>Người đánh giá</th>
            <th >Action</th>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->content}}</td>
                    <td>{{$item->Book->name}}</td>
                    <td>{{$item->User->name}}</td>
                    <td><a href="{{route('admin.reviews.edit', $item->id)}}" class="btn btn-primary">Sửa</a>

                        <button class="btn btn-danger" onclick="if(confirm('Bạn muốn xóa')){
                        document.getElementById('item--{{$item->id}}').submit();
                    }">Xóa</button>
                        <form action="{{route('admin.reviews.destroy', $item->id)}}" id="item--{{$item->id}}" method="post">
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
