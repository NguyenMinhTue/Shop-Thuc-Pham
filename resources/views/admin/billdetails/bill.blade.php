
@extends('admin.admin_layout')
@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Quản lý đơn hàng</h3>
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


                        <th>Mã đơn hàng</th>

                        <th>Tên khách hàng</th>

                        <th>Tổng tiền</th>

                        <th>Ngày đặt</th>

                        <th>Trạng thái</th>

                        <th>Thao tác</th>



                        {{--                        <th> </th>--}}

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bills as $bill)


                        <tr class="gradeX">


                            <td>{{$bill->id}}</td>

                            <td>{{$bill->customer->name}}</td>

                            <td>{{$bill->total}} </td>

                            {{--                            <td>{{$detail->customer->address}} </td>--}}

                            {{--                            <td>{{$detail->customer->name}}</td>--}}

                            <td>{{$bill->created_at}}</td>

                            <td>@if($bill->status == 0) Đang chờ @elseif($bill->status == 1) Xác nhận @elseif($bill->status == 2) Đã huỷ @endif</td>

                            <td>

                                <a href="{{URL::to('admin/billdetails/'.$bill->id.'/'.$bill->id_customer)}}">Chi tiết</a>
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
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script> CKEDITOR.replace('editor1'); </script>
@endsection
