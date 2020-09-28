<div class="agileits_header">
    <div class="w3l_offers">

    </div>
    <div class="w3l_search">
        <form action="{{URL::to('search')}}" method="get">

            <input type="text" name="search" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
            <input type="submit" value=" ">
        </form>
    </div>




    <div class=" w3l_header_right float-right" style="margin-left: 550px !important;">
        <div class="attr-nav" style="">
            <ul>
                <li class="dropdown" style="margin-bottom: 10px"> <a href="" class="dropdown-toggle" data-toggle="dropdown" style="height: 60px;padding-top: 15px;" > <i class="fa fa-shopping-cart " aria-hidden="true" style="color: white;vertical-align: middle"></i><span class="badge"></span></a>
                    <ul class="dropdown-menu cart-list">
{{--                        <a href="{{Route('checkout')}}" class="btn btn-default btn-cart center-block">Checkout</a>--}}

                    <?php $total = 0; ?>
                        @if(session('cart'))
                            @foreach(session('cart') as $id => $product)
                        <li> <a href="{{Route('productdetail',[$product['id'],$product['name']])}}" class="photo"><img src="{{url('/')}}/uploads/brand/{{$product['photo']}}" class="cart-thumb" alt="Sản phẩm 1"></a>
                            <h6><a href=""> {{$product['name'] }}</a>
                            </h6>
                            <p>
                            <input type="number" class="quantity_{{$id}}" id="header_quantity_{{$id}}" value="{{$product['quantity']}}">x - <span class="price">{{$product['price']*$product['quantity']}}VNĐ</span>
                            </p>
                            <button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}" data-quantity="{{$product['quantity']}}"><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                        </li>
                            <?php $total+=  $product['price']*$product['quantity'] ?>

                            @endforeach
                                <li class="total"> <span class="pull-right"><strong>Tổng tiền</strong>:{{$total}}</span> <a href="{{Route('checkout')}}" class="btn btn-default btn-cart">Checkout</a>
                                </li>

                        @else
                            <li>
                                <h6>
                                    <a>Chưa có sản phẩm</a>
                                </h6>
                            </li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="w3l_header_right1" style="margin-right: 90px !important">
        <ul>
            <li class="dropdown profile_details_drop" >

                @if(  Auth::user() )
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-user" aria-hidden="true"  >{{Auth::user()->full_name}}</i><span class="caret"></span></a>
                    <div class="mega-dropdown-menu">
                        <div class="w3ls_vegetables">
                            <ul class="dropdown-menu drp-mnu">
                                <li class="nav-item dropdown">

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"  ><i class="fa fa-user" aria-hidden="true" ></i><span class="caret"></span></a>
                    <div class="mega-dropdown-menu">
                        <div class="w3ls_vegetables" style="float: right; ">
                            <ul class="dropdown-menu drp-mnu">
                                <li><a href="{{Route('login')}}">Đăng nhập</a></li>
                                <li><a href="{{Route('register')}}">Đăng ký</a></li>
                            </ul>
                        </div>
                    </div>
                @endif
            </li>
        </ul>
    </div>

    <div class="clearfix"> </div>

</div>

<!-- script-for sticky-nav -->
<script>
    $(document).ready(function() {
        var navoffeset=$(".agileits_header").offset().top;
        $(window).scroll(function(){
            var scrollpos=$(window).scrollTop();
            if(scrollpos >=navoffeset){
                $(".agileits_header").addClass("fixed");
            }else{
                $(".agileits_header").removeClass("fixed");
            }
        });

    });
</script>

<!-- //script-for sticky-nav -->
<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left col-md-2">
            <h1><a href="{{Route('home')}}"> Store</a></h1>
        </div>
<div class="menu-header col-md-5">
    <tr>
        <td><a href="{{Route('home')}}" title="Trang chủ">Trang chủ</a> </td>
        <td><a href="{{Route('home')}}">Mua hàng</a></td>
        <td><a href="{{Route('mail')}}" title="Liên hệ">Liên hệ</a></td>
        <td><a href="{{Route('home')}}">Blog</a></td>
    </tr>
</div>
        <div class="w3ls_logo_products_left1 col-md-3">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>035 326 0372</li>
                <li><i class="fa fa-envelope-o" aria-hidden="true"></i>nmt22031997@gmail.com</li>
            </ul>
        </div>
{{--        <div class="clearfix"> </div>--}}
    </div>
</div>

