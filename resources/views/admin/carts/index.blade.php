@extends('admin.layout.master')
@section('content')
    <div class="container-fluid">
        <table class="table table-bordered" id="dataTable">
            <thead>
            <th>Tên sách</th>
            <th>Số lượng </th>
            <th>Tổng tiền</th>
            <th>Tên khách hàng</th>
            <th colspan="2">Action</th>
            </thead>
            <tbody>

            @foreach($data as $item)

                <tr>
                    <td>{{$item->Book->name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->sum_money}}</td>
                    <td>{{$item->User->name}}</td>
                    <td><a href="{{route('admin.carts.edit', $item->id)}}" class="btn btn-primary">Sửa</a>

                        <button class="btn btn-danger" onclick="if(confirm('Bạn muốn xóa')){
                        document.getElementById('item--{{$item->id}}').submit();
                    }">Xóa</button>
                        <form action="{{route('admin.carts.destroy', $item->id)}}" id="item--{{$item->id}}" method="post">
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
