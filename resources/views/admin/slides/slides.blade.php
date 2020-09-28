@extends('admin.admin_layout')
@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Quản lý Slides</h3>
        <div class="row mb">
            <!-- page start-->

            <div class="adv-table">
                <table id="example" class="table table-bordered b-t b-light" style="width:100%; background-color: white">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Link</th>
                       <th>Danh mục</th>
                        <th class="hidden-phone">Ảnh</th>
                        <th> <a href="{{URL::to('admin/slides/addSlide')}}"><i class="fa fa-plus "></i></a></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($slides as $slide)
                        <tr class="gradeX">
                            <td>{{$slide->id}}</td>
                            <td>{{$slide->link}}</td>
                            <td>{{$slide->category->name ?? null}}</td>
                            <td><img src="{{url('/')}}/uploads/brand/{{$slide->image}}" alt="" style="width: 50px"></td>
                            <td>
                                <a href="{{URL::to('admin/slides/editSlide/'.$slide->id)}}"><i class="fa fa-pencil "></i></a>
                                <a href="{{URL::to('admin/slides/deleteSlide/'.$slide->id)}}" onclick="return confirm('Bạn có chắc chắn xóa không ?')"><i class="fa fa-times"></i></a>
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
