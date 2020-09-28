@extends('layout')

@section('title-page')
    <div class="products-breadcrumb">
        <div class="container">
            <ul>
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{URL::to('home')}}">Home</a><span>|</span></li>
                <li>Giới thiệu</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="privacy about">
        <h3>Giới thiệu</h3>
        <p class="animi">Hiện nay, thực phẩm bẩn đang là nỗi lo thường trực trong mỗi gia đình khi mà báo chí và các phương tiện truyền thông thường xuyên đăng tải những vụ việc rùng rợn về vấn nạn vệ sinh an toàn thực phẩm. Chính vì thế, kinh doanh thực phẩm sạch đang là một hướng đi được nhiều doanh nghiệp quan tâm đầu tư, SIKIDO cung cấp dịch vụ "thiết kế web bán thực phẩm sạch" để đáp ứng nhu cầu khách hàng..</p>
        <div class="agile_about_grids">
            <div class="col-md-6 agile_about_grid_right">
                <img src="{{URL::to('public/images/31.jpg')}}" alt=" " class="img-responsive" />
            </div>
            <div class="col-md-6 agile_about_grid_left">
                <ol>
                    <li>Giá cả hợp lý</li>
                    <li>Đảm bảo an toàn thực phẩm</li>
                    <li>Đẩy đủ mặt hàng</li>
                    <li>Nhiều sản phẩm uy tín</li>
                    <li>Được người tiêu dùng lựa chọn</li>

                </ol>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
@endsection
@section('member')
    <div class="team">
        <div class="container">
            <h3>Thành viên </h3>
            <div class="agileits_team_grids">
                <div class="col-md-12 agileits_team_grid">
                    <img src="{{URL::to('public/images/anh-dai-dien.jpg')}}" style="width: 25%" alt=" " class="img-responsive" />
                    <h4>Nguyễn Minh Tuệ-255961</h4>
                    <p>Manager</p>
                    <ul class="agileits_social_icons agileits_social_icons_team">
                        <li><a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#" class="google"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    </ul>
                </div>

                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
@endsection

