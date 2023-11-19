@extends('admin.layout.master')
@push('css')
    <link href="{{asset('be/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách User</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <th>ID</th>
                        <th>Tên tác giả</th>
                        <th>Ảnh tác giả</th>
                        <th>Vài nét về tác giả</th>
                        <th >Action</th>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td><img src="{{asset($item->image)}}" width="100px" alt=""></td>
                                <td>{!! $item->description !!}</td>
                                <td><a href="{{route('admin.authors.edit', $item->id)}}" class="btn btn-primary">Sửa</a>

                                    <button class="btn btn-danger" onclick="if(confirm('Bạn muốn xóa')){
                                                    document.getElementById('item--{{$item->id}}').submit();
                                                }">Xóa
                                    </button>
                                    <form action="{{route('admin.authors.destroy', $item->id)}}"
                                          id="item--{{$item->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <!-- Page level plugins -->
    <script src="{{asset('be/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('be/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('be/js/demo/datatables-demo.js')}}"></script>
@endpush
