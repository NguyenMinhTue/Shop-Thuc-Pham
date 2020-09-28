@extends('layout')
@section('title-page')
    <div class="products-breadcrumb">
        <div class="container">
            <ul>
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{Route('home')}}">Home</a><span>|</span></li>
                <li>Check out</li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="privacy about">
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
        <h3>Thanh toán</h3>

        <div class="checkout-right">



            <table class="timetable_sub">
                <thead>
                <tr>
                    <th>SL No.</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Remove</th>
                </tr>
                </thead>
                <tbody>
                @if(session('cart'))
                    @foreach(session('cart') as $id => $product)
                <tr class="rem1">
                    <td class="invert">{{$id}}</td>
                    <td class="invert-image"><a href="{{Route('productdetail',[$product['id'],$product['name']])}}"><img src="{{ url('/') }}/uploads/brand/{{$product['photo']}}" alt=" " class="img-responsive"></a></td>
                    <td class="invert">
                        <div class="quantity">
                            <div class="quantity-select">
                                <input type="number" class="quantity_{{$id}}" id="checkout_quantity_{{$id}}" value="{{$product['quantity']}}">
                            </div>
                        </div>
                    </td>

                    <td class="invert">{{$product['name']}}</td>

                    <td class="invert">{{$product['price']*$product['quantity']}}VNĐ</td>
                    <td class="invert">
                        <button class="btn btn-info btn-sm update-cart-checkout" data-id="{{ $id }}" data-quantity="{{$product['quantity']}}"><i class="fa fa-refresh"></i></button>
                        <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>

                    </td>
                </tr>
                    @endforeach
                @endif

                </tbody></table>

        </div>
        <div class="checkout-left">
            <div class="col-md-4 checkout-left-basket">
                <h4 ><a href="{{Route('home')}}" style="color: white;" >Tiếp tục mua sắm</a></h4>
                <ul>
                <?php $total =0; ?>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $product)
                    <li>{{$product['name']}} <i>-</i> <span>{{$product['price']*$product['quantity']}} </span></li>
                            <?php  $total+= $product['price']*$product['quantity'] ?>
                        @endforeach
                    @endif

                    <li>Total <i>-</i> <span>{{$total}}</span></li>
                </ul>
            </div>
            <div class="col-md-8 address_form_agile">
                <h4>Địa chỉ nhận hàng</h4>

                <form action="{{Route('checkoutSave')}}" method="post" class="creditly-card-form agileinfo_form">
                    @csrf
                    <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                        <div class="information-wrapper">
                            <div class="first-row form-group">
                                <div class="controls">
                                    <label class="control-label">Họ và tên: </label>
                                    <input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
                                </div>

                                <div class="controls">
                                    <label class="control-label">Giới Tính </label>
                                    <select class="form-control option-w3ls" name="gender">
                                        <option value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                    </select>
                                    <div class="clear"> </div>
                                </div>
                                <div class="w3_agileits_card_number_grids">
                                    <div class="w3_agileits_card_number_grid_left">
                                        <div class="controls">
                                            <label class="control-label">Số điện thoại:</label>
                                            <input class="form-control" type="text" name="phone" placeholder="Mobile number">
                                        </div>
                                    </div>

                                    <div class="clear"> </div>
                                </div>
                                <div class="controls">
                                    <label class="control-label">Địa Chỉ </label>
                                    <input class="form-control" type="text" name="address" placeholder="Địa Chỉ">
                                </div>
                            </div>
                            <button type="submit" >Giao hàng đến địa chỉ này</button>
                        </div>
                    </section>
                </form>
                <div class="checkout-right-basket">
                    <a href="payment.php">Thực hiện thanh toán <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
                </div>
            </div>

            <div class="clearfix"> </div>

        </div>

    </div>

@endsection
