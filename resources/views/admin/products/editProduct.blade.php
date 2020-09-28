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
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value="{{$product->name}}">
            </div>

            <div class="form-group">
                <label for="">Danh mục</label>
                <select name="category_id">
                    @foreach ($categories as $cate)
                        <option {!! ($product->category_id == $cate->id)?'selected':''!!} value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mô tả</label>
                <input type="text" class="form-control" name="desc" value="{{$product->description}}" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Giá cũ</label>
                <input type="text" class="form-control" name="old_price" value="{{$product->old_price}}" aria-describedby="emailHelp">

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giá mới</label>
                <input type="text" class="form-control" name="new_price" value="{{$product->new_price}}" aria-describedby="emailHelp">

            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Ảnh</label>
                <div class="image">
                    <img src="{{url('/')}}/uploads/brand/{{$product->image}}" style="width: 100px; height: 50px" >
                </div>
                <input type="file" class="form-control" name="image" value="{{$product->image}}">
            </div>

            <div class="form-group">
                <label for="">Trạng thái hiển thị</label>
                <input {!! ($product->status==1)?'checked':'' !!} type="checkbox" id="" placeholder="" value="1" name="status"> <em>Check để hiển thị </em>
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{URL::to('admin/products')}}"  class="btn btn-warning">Hủy</a>
        </form>

    </div>

@endsection
