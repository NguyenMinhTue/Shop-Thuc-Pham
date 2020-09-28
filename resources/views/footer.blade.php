<div class="newsletter">
    <div class="container">
        <div class="w3agile_newsletter_left">
            <h3>Đăng ký Email để nhận thông báo</h3>
        </div>
        <div class="w3agile_newsletter_right">
            <form action="#" method="post">
                <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                <input type="submit" value="subscribe now">
            </form>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //newsletter -->
<!-- footer -->
<div class="footer">
    <div class="container">

        <div class="col-md-3 w3_footer_grid">
            <h3>Thông tin</h3>
            <ul class="w3_footer_grid_list">
                <li><a href="{{URL::to('event')}}">Sự kiện</a></li>
                <li><a href="{{URL::to('gioithieu')}}">Giới thiệu</a></li>

                <li><a href="{{URL::to('dichvu')}}">Dịch vụ</a></li>
                <li><a href="{{URL::to('mail')}}">Liên hệ</a></li>
            </ul>
        </div>

        <div class="col-md-3 w3_footer_grid" >
            <h3>Xem cửa hàng</h3>
            <ul class="w3_footer_grid_list">
                <li><a href="pet.php">Thức ăn cho pet</a></li>

                <li><a href="drinks.php">Đồ uống</a></li>
                <li><a href="bread.php">Bánh</a></li>
                <li><a href="household.php">Đồ dùng gia đình</a></li>
            </ul>
        </div>
        <div class="col-md-3 w3_footer_grid">
            <h3>Bài viết nổi bật</h3>
            <ul class="w3_footer_grid_list1">

            </ul>
        </div>
        <div class="clearfix"> </div>
        <div class="agile_footer_grids">
            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom">
                    <h4>100% secure payments</h4>
                    <img src="{{ url('/') }}/uploads/brand/card.png" alt=" " class="img-responsive" />
                </div>
            </div>
            <div class="col-md-3 w3_footer_grid agile_footer_grids_w3_footer">
                <div class="w3_footer_grid_bottom">
                    <h5>Liên hệ với chúng tôi</h5>
                    <ul class="agileits_social_icons">
                        <li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>

    </div>
</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="{{\Illuminate\Support\Facades\URL::asset('js/bootstrap.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->
<script src="{{\Illuminate\Support\Facades\URL::asset('js/minicart.js')}}"></script>
<script>
    paypal.minicart.render();

    paypal.minicart.cart.on('checkout', function (evt) {
        var items = this.items(),
            len = items.length,
            total = 0,
            i;

        // Count the number of each item in the cart
        for (i = 0; i < len; i++) {
            total += items[i].get('quantity');
        }

        if (total < 3) {
            alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
            evt.preventDefault();
        }
    });

</script>
{{--update cart vs detele cart--}}
<script type="text/javascript">

    $(".update-cart-checkout").click(function (e) {
        e.preventDefault();

        var ele = $(this);
        var quantity = $("#checkout_quantity_"+ele.attr("data-id")).val();
        $.ajax({
            url: '{{ url('update-cart') }}',
            method: "post",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.attr("data-id"),
                quantity: quantity
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });
    $(".update-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);
        var quantity = $("#header_quantity_"+ele.attr("data-id")).val();
        $.ajax({
            url: '{{ url('update-cart') }}',
            method: "post",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.attr("data-id"),
                quantity: quantity
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);


        if(confirm("Bạn chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng")) {
            $.ajax({
                url: '{{ url('remove-from-cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

</script>
