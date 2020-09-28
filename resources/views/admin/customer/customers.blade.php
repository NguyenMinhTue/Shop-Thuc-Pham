
@extends('admin.admin_layout')
@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Quản lý khách hàng</h3>
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
                        <th>Tên khách hàng</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>SDT</th>

                        <th> </th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($customers as $cus)
                        <tr class="gradeX">
                            <td>{{$cus->id}}</td>
                            <td>{{$cus->name}}</td>
                            <td>@if($cus->gender == 1) Nữ @else  Nam @endif</td>
                            <td>{{$cus->address}}</td>
                            <td>{{$cus->phone_number}}</td>
                            <td><a href="{{URL::to('admin/customers/history/'.$cus->id)}}"><i class="fa fa-eye "></i></a></td>

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
