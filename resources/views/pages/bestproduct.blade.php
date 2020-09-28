@extends('layout')

{{--@section('slide')--}}
{{--    --}}
{{--@endsection--}}

@section('content')

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
    <link rel="stylesheet" href="{{asset('public/css/flexslider.css')}}" type="text/css" media="screen" property="" />
    <script defer src="{{asset('public/js/jquery.flexslider.js')}}"></script>
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
            <h3>{{$cate->description}}</h3>
            <?php
            $four_products = $cate->product->where('category_id',$cate->id)->where('status',1)->sortByDesc('count_buy')->take(4);

            ?>
            @foreach($four_products as $product)
            <div class="agile_top_brands_grids">
                <div class="col-md-3 top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="tag"><img src="{{URL::to('public/images/offer.png')}}" alt=" " class="img-responsive" /></div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block" >
                                        <div class="snipcart-thumb">
                                            <a href="{{URL::to('/product/'.$product->id.'/'.$product->name)}}"><img title=" " alt=" " src="{{URL::to('public/images/'.$product->image)}}" /></a>
                                            <p>{{$product->name}}</p>
                                            <h4>{{$product->new_price}} <span>{{$product->old_price}} </span></h4>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details">
                                            <form action="checkout.php" method="post">
                                                <fieldset>
                                                    <input type="hidden" name="cmd" value="_cart" />
                                                    <input type="hidden" name="add" value="1" />
                                                    <input type="hidden" name="business" value=" " />
                                                    <input type="hidden" name="item_name" value="Fortune Sunflower Oil" />
                                                    <input type="hidden" name="amount" value="7.99" />
                                                    <input type="hidden" name="discount_amount" value="1.00" />
                                                    <input type="hidden" name="currency_code" value="USD" />
                                                    <input type="hidden" name="return" value=" " />
                                                    <input type="hidden" name="cancel_return" value=" " />
                                                    <input type="submit" name="submit" value="Add to cart" class="button" />
                                                </fieldset>

                                            </form>

                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"> </div>
                @endforeach
{{--                <div class="col-md-3 top_brand_left">--}}
{{--                    <div class="hover14 column">--}}
{{--                        <div class="agile_top_brand_left_grid">--}}
{{--                            <div class="agile_top_brand_left_grid1">--}}
{{--                                <figure>--}}
{{--                                    <div class="snipcart-item block" >--}}
{{--                                        <div class="snipcart-thumb">--}}
{{--                                            <a href="{{URL::to('chitietsanpham')}}"><img title=" " alt=" " src="{{URL::to('public/images/3.png')}}" /></a>--}}
{{--                                            <p>basmati rise (5 Kg)</p>--}}
{{--                                            <h4>$11.99 <span>$15.00</span></h4>--}}
{{--                                        </div>--}}
{{--                                        <div class="snipcart-details top_brand_home_details">--}}
{{--                                            <form action="#" method="post">--}}
{{--                                                <fieldset>--}}
{{--                                                    <input type="hidden" name="cmd" value="_cart" />--}}
{{--                                                    <input type="hidden" name="add" value="1" />--}}
{{--                                                    <input type="hidden" name="business" value=" " />--}}
{{--                                                    <input type="hidden" name="item_name" value="basmati rise" />--}}
{{--                                                    <input type="hidden" name="amount" value="11.99" />--}}
{{--                                                    <input type="hidden" name="discount_amount" value="1.00" />--}}
{{--                                                    <input type="hidden" name="currency_code" value="USD" />--}}
{{--                                                    <input type="hidden" name="return" value=" " />--}}
{{--                                                    <input type="hidden" name="cancel_return" value=" " />--}}
{{--                                                    <input type="submit" name="submit" value="Add to cart" class="button" />--}}
{{--                                                </fieldset>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3 top_brand_left">--}}
{{--                    <div class="hover14 column">--}}
{{--                        <div class="agile_top_brand_left_grid">--}}
{{--                            <div class="agile_top_brand_left_grid_pos">--}}
{{--                                <img src="{{URL::to('public/images/offer.png')}}" alt=" " class="img-responsive" />--}}
{{--                            </div>--}}
{{--                            <div class="agile_top_brand_left_grid1">--}}
{{--                                <figure>--}}
{{--                                    <div class="snipcart-item block">--}}
{{--                                        <div class="snipcart-thumb">--}}
{{--                                            <a href="{{URL::to('chitietsanpham')}}"><img src="{{URL::to('public/images/2.png')}}" alt=" " class="img-responsive" /></a>--}}
{{--                                            <p>Pepsi soft drink (2 Ltr)</p>--}}
{{--                                            <h4>$8.00 <span>$10.00</span></h4>--}}
{{--                                        </div>--}}
{{--                                        <div class="snipcart-details top_brand_home_details">--}}
{{--                                            <form action="#" method="post">--}}
{{--                                                <fieldset>--}}
{{--                                                    <input type="hidden" name="cmd" value="_cart" />--}}
{{--                                                    <input type="hidden" name="add" value="1" />--}}
{{--                                                    <input type="hidden" name="business" value=" " />--}}
{{--                                                    <input type="hidden" name="item_name" value="Pepsi soft drink" />--}}
{{--                                                    <input type="hidden" name="amount" value="8.00" />--}}
{{--                                                    <input type="hidden" name="discount_amount" value="1.00" />--}}
{{--                                                    <input type="hidden" name="currency_code" value="USD" />--}}
{{--                                                    <input type="hidden" name="return" value=" " />--}}
{{--                                                    <input type="hidden" name="cancel_return" value=" " />--}}
{{--                                                    <input type="submit" name="submit" value="Add to cart" class="button" />--}}
{{--                                                </fieldset>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-3 top_brand_left">--}}
{{--                    <div class="hover14 column">--}}
{{--                        <div class="agile_top_brand_left_grid">--}}
{{--                            <div class="agile_top_brand_left_grid_pos">--}}
{{--                                <img src="{{URL::to('public/images/offer.png')}}" alt=" " class="img-responsive" />--}}
{{--                            </div>--}}
{{--                            <div class="agile_top_brand_left_grid1">--}}
{{--                                <figure>--}}
{{--                                    <div class="snipcart-item block">--}}
{{--                                        <div class="snipcart-thumb">--}}
{{--                                            <a href="{{URL::to('chitietsanpham')}}  "><img src="{{URL::to('public/images/4.png')}}" alt=" " class="img-responsive" /></a>--}}
{{--                                            <p>dogs food (4 Kg)</p>--}}
{{--                                            <h4>$9.00 <span>$11.00</span></h4>--}}
{{--                                        </div>--}}
{{--                                        <div class="snipcart-details top_brand_home_details">--}}
{{--                                            <form action="#" method="post">--}}
{{--                                                <fieldset>--}}
{{--                                                    <input type="hidden" name="cmd" value="_cart" />--}}
{{--                                                    <input type="hidden" name="add" value="1" />--}}
{{--                                                    <input type="hidden" name="business" value=" " />--}}
{{--                                                    <input type="hidden" name="item_name" value="dogs food" />--}}
{{--                                                    <input type="hidden" name="amount" value="9.00" />--}}
{{--                                                    <input type="hidden" name="discount_amount" value="1.00" />--}}
{{--                                                    <input type="hidden" name="currency_code" value="USD" />--}}
{{--                                                    <input type="hidden" name="return" value=" " />--}}
{{--                                                    <input type="hidden" name="cancel_return" value=" " />--}}
{{--                                                    <input type="submit" name="submit" value="Add to cart" class="button" />--}}
{{--                                                </fieldset>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </figure>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //top-brands -->
    <!-- fresh-vegetables -->
    <div class="fresh-vegetables">
        <div class="container">
            <h3>Top Products</h3>
            <div class="w3l_fresh_vegetables_grids">
                <div class="col-md-3 w3l_fresh_vegetables_grid w3l_fresh_vegetables_grid_left">
                    <div class="w3l_fresh_vegetables_grid2">
                        <ul>
                            <li><i class="fa fa-check" aria-hidden="true"></i><a href="{{URL::to('products')}}">Tất cả</a></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i><a href="{{URL::to('vegetables')}}">Rau củ</a></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i><a href="{{URL::to('vegetables')}}">Trái cây</a></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i><a href="{{URL::to('drinks')}}">Nước ép</a></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i><a href="{{URL::to('pet')}}">Thức ăn cho pet</a></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i><a href="{{URL::to('bread')}}">Bánh</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 w3l_fresh_vegetables_grid_right">
                    <div class="col-md-4 w3l_fresh_vegetables_grid">
                        <div class="w3l_fresh_vegetables_grid1">
                            <img src="{{URL::to('public/images/8.jpg')}}" alt=" " class="img-responsive" />
                        </div>
                    </div>
                    <div class="col-md-4 w3l_fresh_vegetables_grid">
                        <div class="w3l_fresh_vegetables_grid1">
                            <div class="w3l_fresh_vegetables_grid1_rel">
                                <img src="{{URL::to('public/images/7.jpg')}}" alt=" " class="img-responsive" />
                                <div class="w3l_fresh_vegetables_grid1_rel_pos">
                                    <div class="more m1">
                                        <a href="products.php" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w3l_fresh_vegetables_grid1_bottom">
                            <img src="{{URL::to('public/images/10.jpg')}}" alt=" " class="img-responsive" />
                            <div class="w3l_fresh_vegetables_grid1_bottom_pos">
                                <h5>Special Offers</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 w3l_fresh_vegetables_grid">
                        <div class="w3l_fresh_vegetables_grid1">
                            <img src="{{URL::to('public/images/9.jpg')}}" alt=" " class="img-responsive" />
                        </div>
                        <div class="w3l_fresh_vegetables_grid1_bottom">
                            <img src="{{URL::to('public/images/11.jpg')}}" alt=" " class="img-responsive" />
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="agileinfo_move_text">
                        <div class="agileinfo_marquee">
                            <h4>get <span class="blink_me">25% off</span> on first order and also get gift voucher</h4>
                        </div>
                        <div class="agileinfo_breaking_news">
                            <span> </span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection
