@extends('admin.admin_layout')
@section('css')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">
@endsection
@section('content')
    <div class="wrapper">
            @if(count($errors) > 0 )
            <div class="alert alert-warning">
                @foreach($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif
        <form action="" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value="{{$category->name}}">
                {{--                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--}}
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mô tả</label>
                <input type="text" class="form-control" name="desc" value="{{$category->description}}">
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>

    </div>

@endsection
