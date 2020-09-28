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
            <form action="" method="post" enctype="multipart/form-data">

                {{csrf_field()}}
                <div class="form-group">
                    <label for="exampleInputEmail1">Link</label>
                    <input type="text" class="form-control" name="link" aria-describedby="emailHelp" value="{{$slides->link}}">

                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Danh mục</label>
                    <select name="category_id" id="">
                        @foreach($categories as $cate)
                            <option  {!! ($slides->category_id == $cate->id)?'selected':''!!} value="{{$cate->id}}">{{$cate->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh</label>
                    <img src="{{url('/')}}/uploads/brand/{{$slides->image}}" style="width: 100px; height: 50px" >
                    <input type="file" class="form-control" name="image" value="{{$slides->image}}">

                </div>

                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>

    </div>
@endsection
