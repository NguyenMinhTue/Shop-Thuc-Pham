@extends('admin.admin_layout')
@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
    <div class="wrapper">
        <form action="" method="post" enctype="multipart/form-data">
            @if($errors->any())
                <div class="alert alert-danger fade in alert-dismissible" style="margin-top:18px;">
                    @foreach ($errors->all() as $error)
                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                        <strong>{{ $error }}</strong> .


                    @endforeach
                </div>
            @endif
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Link</label>
                <input type="text" class="form-control" name="link" aria-describedby="emailHelp">

            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Danh mục</label>
                <select name="category_id" id="">
                    @foreach($categories as $cate)
                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Ảnh</label>
                <input type="file" class="form-control" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>

    </div>

@endsection
