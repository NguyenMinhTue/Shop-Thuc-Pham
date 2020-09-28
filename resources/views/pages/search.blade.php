@extends('layout')


@section('content')

        <div class="container">
            <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">
{{--                <h3>{{$categories->description}}</h3>--}}
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
                                            <div class="snipcart-item block">
                                                <div class="snipcart-thumb">
                                                    <a href="{{URL::to('/product/'.$product->id.'/'.$product->name)}}"><img src="{{url('/')}}/uploads/brand/{{$product->image}}" alt=" " class="img-responsive" /></a>
                                                    <p>{{$product->name}}</p>
                                                    <h4>{{$product->new_price}} <span>{{$product->old_price}}</span></h4>
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


            </div>
        </div>

@endsection
