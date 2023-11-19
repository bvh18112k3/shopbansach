@extends('admin.layout.master')
@push('css')
    <link href="{{asset('be/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <table class="table " id="dataTable">
            <thead>

            <th>Tên người nhận hàng</th>
            <th>Email người nhận hàng</th>
            <th>Số điện thoại người nhận hàng</th>
            <th>Điạ chỉ người nhận hàng</th>
            <th>Trạng thái đơn hàng</th>
            <th>Tổng tiền cần thanh toán</th>

            <th colspan="2">Thao tác</th>
            </thead>
            <tbody>
            @foreach($data as $item)
                <tr>

                    <td>{{$item->Address->order_name}}</td>
                    <td>{{$item->Address->order_email}}</td>
                    <td>{{$item->Address->order_phone}}</td>
                    <td>{{$item->Address->order_address}}</td>
                    @if($item->order_status === 0)
                        <td>Đang chờ xác nhận</td>
                    @elseif($item->order_status === 1)
                        <td>Đang chuẩn bị hàng</td>
                    @elseif($item->order_status === 2 )
                        <td>Đang vận chuyển</td>
                    @else
                        <td>Đơn hàng đã được giao</td>
                    @endif
                    <td>{{$item->total_money}}</td>


                    @if($item->order_status == 0)
                        <td style="width: 120px"><a href="{{route('admin.orders.edit', $item->id)}}" class="btn btn-primary">Xác nhận</a></td>
                        <td> <button class="btn btn-danger" onclick="if(confirm('Xác nhận hủy')){
                        document.getElementById('item--{{$item->id}}').submit();
                    }">Hủy
                            </button>
                            <form action="{{route('admin.orders.destroy', $item->id)}}" id="item--{{$item->id}}"
                                  method="post">
                                @csrf
                                @method('DELETE')
                            </form></td>
                    @elseif($item->order_status == 1)
                        <td> <a href="{{route('admin.orders.edit', $item->id)}}" class="btn btn-primary">Gửi hàng</a></td>
                    @elseif($item->order_status == 2)
                        <td><a href="{{route('admin.orders.edit', $item->id)}}" class="btn btn-primary">Thành công</a></td>
                        @else
                        <td> <a href="" class="btn btn-success">Xem chi tiết</a></td>
                        @endif



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
