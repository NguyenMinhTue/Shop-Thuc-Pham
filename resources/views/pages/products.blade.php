@extends('layout')


@section('title-page')
    <div class="products-breadcrumb">
        <div class="container">
            <ul>
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{Route('home')}}">Home</a><span>|</span></li>
                <li>Thực phẩm uy tín</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')

        <div class="w3l_banner_nav_right_banner3">
            <h3>Thực phẩm tốt nhất<span class="blink_me"></span></h3>
        </div>
        <div class="w3l_banner_nav_right_banner3_btm">
            <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
                <div class="view view-tenth">
                    <img src="{{ url('/') }}/uploads/brand/13.jpg" alt=" " class="img-responsive" />

                </div>


            </div>
            <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
                <div class="view view-tenth">
                    <img src="{{ url('/') }}/uploads/brand/14.jpg" alt=" " class="img-responsive" />
                </div>
            </div>
            <div class="col-md-4 w3l_banner_nav_right_banner3_btml">
                <div class="view view-tenth">
                    <img src="{{ url('/') }}/uploads/brand/15.jpg" alt=" " class="img-responsive" />

                </div>

            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="w3ls_w3l_banner_nav_right_grid">

            <div class="w3ls_w3l_banner_nav_right_grid1">
                @foreach($categories as $cate)

                    <h3>{{$cate->name}}</h3>

                    <?php
                    $four_products = $cate->product->where('status',1)->where('category_id',$cate->id)->sortByDesc('created_at');

                    ?>

                    @foreach($four_products as $product)
                        <div class="agile_top_brands_grids">
                            <div class="col-md-3 top_brand_left">
                                <div class="hover14 column">
                                    <div class="agile_top_brand_left_grid">
{{--                                        <div class="tag"><img src="{{ url('/') }}/uploads/brand/offer.png" alt=" " class="img-responsive" /></div>--}}
                                        <div class="agile_top_brand_left_grid1">
                                            <figure>
                                                <div class="snipcart-item block" >
                                                    <div class="snipcart-thumb">
                                                        <a href="{{URL::to('/product/'.$product->id.'/'.$product->name)}}"><img title=" " alt=" " src="{{ url('/') }}/uploads/brand/{{$product->image}}" /></a>
                                                        <p>{{$product->name}}</p>
                                                        <h4>{{$product->new_price}} VNĐ <span>{{$product->old_price}} VNĐ</span></h4>
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
                            @endforeach
                <div class="clearfix"> </div>
            </div>

        </div>

@endsection

