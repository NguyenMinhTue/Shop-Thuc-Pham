
@extends('admin.admin_layout')
{{--@section('css')--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">--}}
{{--@endsection--}}
@section('content')
    <section class="wrapper">

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
        <div class="">
            <h3>Thông tin khách hàng</h3>
            <h5>Tên: {{$customer->name}}</h5>
            <h5>Địa chỉ: {{$customer->address}}</h5>
        </div>
            <div style="text-align: center"> <h3>Danh sách sản phẩm</h3></div>
        <div class="row mb">
            <!-- page start-->

            <div class="adv-table ">
                <table id="example" class="table table-bordered b-t b-light " style="width:100%; background-color: white;border: 1px">
                    <thead>
                    <tr>

                        <th>Mã đơn hàng</th>

                        <th>Tên sản phẩm</th>


                        <th>Số lượng</th>

                        <th>Đơn giá</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($details as $detail)

                        <tr class="gradeX">



                            <td>{{$detail->id}}</td>

                            <td>{{$detail->product->name}}</td>

                            <td>{{$detail->quantity}}</td>

                            <td>{{$detail->price}}</td>




                        </tr>
                    @endforeach


                    </tbody>
                </table>
                <div style="color: red"><h4><strong>Tổng tiền:  {{$detail->bills->total}}</strong></h4></div>
                <div style="float: right">
                    <a href="{{URL::to('admin/bills')}}"type="button" class="btn btn-primary">Danh sách đơn hàng</a>
                </div>

                <h4 >Tình trạng đơn hàng: @if($status_bill->status == 0) Đang chờ @elseif($status_bill->status == 1) Xác nhận @elseif($status_bill->status == 2) Đã huỷ @endif</h4>
                <form action="{{URL::to('admin/status_bill/'.$status_bill->id)}}" method="post">
                    {{csrf_field()}}
                    <select name="status_bill" id="" >
                        <option value="2">Hủy</option>
                        <option value="1">Xác nhận</option>
                    </select>
                    <button type="submit">Cập nhật</button>
                </form>

                </div>
        </div>

    </section>
@endsection

@section('js')
    {{--    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>--}}
{{--    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('#example').DataTable({--}}
{{--                "order": [[0, "desc"]]--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>--}}
{{--    <script> CKEDITOR.replace('editor1'); </script>--}}
@endsection
