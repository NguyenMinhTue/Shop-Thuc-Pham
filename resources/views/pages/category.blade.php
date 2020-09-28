@extends('layout')

@section('title-page')
    <div class="products-breadcrumb">
        <div class="container">
            <ul>
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{Route('home')}}">Home</a><span>|</span></li>
                <li>{{$category->name}}</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
        @if(isset($slide))
        <div class="w3l_banner_nav_right_banner" style="background:url({{url('/')}}/uploads/brand/{{$slide->image}}) no-repeat 0px 0px;">
            @endif
        </div>
        <div class="container">
        <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">
            <h3>{{$category->description}}</h3>
            <div class="w3ls_w3l_banner_nav_right_grid1">

            @foreach($products as $product)
                <div class="col-md-3 w3ls_w3l_banner_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                                <img src="{{url('/')}}/uploads/brand/offer.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block" >
                                        <div class="snipcart-thumb">
                                            <a href="{{URL::to('/product/'.$product->id.'/'.$product->name)}}"><img src="{{url('/')}}/uploads/brand/{{$product->image}}" alt=" " class="img-responsive" /></a>
                                            <p>{{$product->name}}</p>
                                            <h4>{{$product->new_price}} VNĐ<span>{{$product->old_price}} VNĐ</span></h4>
                                        </div>
                                        <div class="text-center " > <a href="{{Route('addcart',$product->id)}}" class="btn btn-default" style="background: red;color: #1a1a1a">ADD TO CART</a></div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="clearfix"> </div>
            </div>
            <div class="row">
            {!! $products->links() !!}
            </div>

        </div>
        </div>

@endsection
