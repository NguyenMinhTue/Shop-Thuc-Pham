@extends('layout')


@section('title-page')
    <div class="products-breadcrumb">
        <div class="container">
            <ul>
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="../../../public/index.php">Home</a><span>|</span></li>
                <li>Liên hệ</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="mail">
        <h3>MAIL US</h3>
        <div class="agileinfo_mail_grids">
            <div class="col-md-4 agileinfo_mail_grid_left">
                <ul>
                    <li><i class="fa fa-home" aria-hidden="true"></i></li>
                    <li>Địa chỉ<span>459 Bạch Mai.</span></li>
                </ul>
                <ul>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i></li>
                    <li>email<span><a href="mailto:nmt22031997@gmail.com">nmt22031997@gmail.com</a></span></li>
                </ul>
                <ul>
                    <li><i class="fa fa-phone" aria-hidden="true"></i></li>
                    <li>Điện thoại<span>035 326 0372</span></li>
                </ul>
            </div>
            <div class="col-md-8 agileinfo_mail_grid_right">
                <form action="{{URL::to('#')}}" method="post">
                    <div class="col-md-6 wthree_contact_left_grid">
                        <input type="text" name="Name" value="Tên" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name*';}" required="">
                        <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email*';}" required="">
                    </div>
                    <div class="col-md-6 wthree_contact_left_grid">
                        <input type="text" name="Telephone" value="Số điện thoại" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone*';}" required="">

                    </div>
                    <div class="clearfix"> </div>
                    <textarea  name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Tin nhắn...</textarea>
                    <input type="submit" value="Gửi">
                    <input type="reset" value="Xóa">
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7334694906763!2d105.84113201440695!3d21.003318494023382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac773026b415%3A0x499b8b613889f78a!2zVHLGsOG7nW5nIMSQ4bqhaSBI4buNYyBYw6J5IEThu7FuZw!5e0!3m2!1svi!2s!4v1589338136962!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>

@endsection

