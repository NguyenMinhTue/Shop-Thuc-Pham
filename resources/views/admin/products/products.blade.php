@extends('admin.admin_layout')
@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Quản lý sản phẩm</h3>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-warning">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="row mb">
            <!-- page start-->

                <div class="adv-table">
                    <table id="example" class="table table-bordered b-t b-light" style="width:100%; background-color: white">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th class="hidden-phone">Mô tả</th>
                            <th class="hidden-phone">Giá cũ</th>
                            <th class="hidden-phone">Giá mới</th>
                            <th class="hidden-phone">Ảnh</th>
                            <th class="hidden-phone">Số lượt mua</th>
                            <th class="hidden-phone">Trạng thái</th>
                            <th> <a href="{{URL::to('admin/products/addProduct')}}"><i class="fa fa-plus "></i></a></th>
{{--                            <th class="hidden-phone"><a href="{{URL::to('admin/products/add')}}"></a><i class="fa fa-address-card "></i> </th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr class="gradeX">
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->old_price}}</td>
                            <td>{{$product->new_price}}</td>
                            <td><img src="{{url('/')}}/uploads/brand/{{$product->image}}" alt="" style="width: 50px"></td>
                            <td>{{$product->count_buy}}</td>
                            <td>{{$product->status}}</td>
                            <td>

                                <a href="{{URL::to('admin/products/editProduct/'.$product->id)}}"><i class="fa fa-pencil "></i></a>
                                <a href="{{URL::to('admin/products/deleteProduct/'.$product->id)}}" onclick="return confirm('Bạn có chắc chắn xóa không ?')"><i class="fa fa-times"></i></a>
                            </td>


                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- page end-->

        <!-- /row -->
    </section>
@endsection
@section('js')
{{--    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>--}}
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "order": [[0, "desc"]]
            });
        });
    </script>

    @endsection
