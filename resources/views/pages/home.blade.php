@extends('layout')

{{--@section('slide')--}}
{{--    --}}
{{--@endsection--}}

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
    <section class="slider">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <div class="w3l_banner_nav_right_banner">

                        <div class="more">
                            <a href="{{URL::to('products')}}" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="w3l_banner_nav_right_banner1">

                        <div class="more">
                            <a href="{{URL::to('products')}}" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="w3l_banner_nav_right_banner2">
                        <h3>upto <i>50%</i> off.</h3>
                        <div class="more">
                            <a href="{{URL::to('products')}}" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- flexSlider -->
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('css/flexslider.css')}}" type="text/css" media="screen" property="" />
    <script defer src=" {{\Illuminate\Support\Facades\URL::asset('js/jquery.flexslider.js')}}"></script>
    <script type="text/javascript">
        $(window).load(function(){
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider){
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
    <div class="top-brands">
        <div class="container">
            @foreach($categories as $cate)
            <h3>{{$cate->name}}</h3>
            <?php
            $four_products = $cate->product->where('status',1)->where('category_id',$cate->id)->sortByDesc('created_at')->take(4);

            ?>
            @foreach($four_products as $product)
            <div class="agile_top_brands_grids">
                <div class="col-md-3 top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="tag"><img src="{{ url('/') }}/uploads/brand/offer.png" alt=" " class="img-responsive" /></div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block" >
                                        <div class="snipcart-thumb">
                                            <a href="{{URL::to('/product/'.$product->id.'/'.$product->name)}}"><img title=" " alt=" " src="{{ url('/') }}/uploads/brand/{{$product->image}}" /></a>
                                            <p>{{$product->name}}</p>
                                            <h4>{{$product->new_price}} <span>{{$product->old_price}} </span></h4>
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
    </div>
    <!-- //top-brands -->
    <!-- fresh-vegetables -->
    <div class="fresh-vegetables">
        <div class="container">
            <h3>Top Products</h3>
            @foreach($bestproduct as $product)
                <div class="agile_top_brands_grids">
                    <div class="col-md-3 top_brand_left">
                        <div class="hover14 column">
                            <div class="agile_top_brand_left_grid">
                                <div class="tag"><img src="{{ url('/') }}/uploads/brand/offer.png" alt=" " class="img-responsive" /></div>
                                <div class="agile_top_brand_left_grid1">
                                    <figure>
                                        <div class="snipcart-item block" >
                                            <div class="snipcart-thumb">
                                                <a href="{{URL::to('/product/'.$product->id.'/'.$product->name)}}"><img title=" " alt=" " src="{{ url('/') }}/uploads/brand/{{$product->image}}" /></a>
                                                <p>{{$product->name}}</p>
                                                <h4>{{$product->new_price}} <span>{{$product->old_price}} </span></h4>
                                            </div>
                                            <div class="text-center " > <a href="{{Route('addcart',$product->id)}}" class="btn btn-default" style="background: red;color: #1a1a1a">ADD TO CART</a></div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

        </div>
    </div>
@endsection
