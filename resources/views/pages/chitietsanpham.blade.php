@extends('layout')

@section('title-page')
    <div class="products-breadcrumb">
        <div class="container">
            <ul>
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{Route('home')}}">Home</a><span>|</span></li>
                <li>Chi tiết</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach($errors -> all() as $err)
                {{$err}}<br>
            @endforeach
        </div>
    @endif
    @if(session('message'))
        <div class="alert alert-success">{{session('message')}}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success" style="position: absolute;z-index: 1000;width: 100%">{{session('success')}}</div>
    @endif
    <div class="w3l_banner_nav_right_banner3">
        <h3>Thực phẩm tốt nhất<span class="blink_me"></span></h3>
    </div>
    <div class="agileinfo_single">
        <h5>{{$product->name}}</h5>
        <h4> Giá: {{$product->new_price}} VNĐ </h4>
        <div class="col-md-4 agileinfo_single_left">
            <img id="example" src="{{url('/')}}/uploads/brand/{{$product->image}}" alt=" " class="img-responsive" />
        </div>
        <div class="col-md-8 agileinfo_single_right">
            <div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked>
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
            </div>
            <div class="w3agile_description">
                <h4>Mô tả sản phẩm :</h4>
                <p>{{$product->description}}</p>
            </div>
            <div class="snipcart-item block">
                <div class="text-center " > <a href="{{Route('addcart',$product->id)}}" class="btn btn-default" style="background: red;color: #1a1a1a">ADD TO CART</a></div>
        </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    </div>

@endsection
