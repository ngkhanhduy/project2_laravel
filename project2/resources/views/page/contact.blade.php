@extends('page.layout.index')

@section('content')
<!-- Page Content -->
<div class="container">
    <div class="space20"></div>


    <div class="row main-left">
        @include('page.layout.menu')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
                </div>

                <div class="panel-body">
                    <!-- item -->
                    <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>

                    <div class="break"></div>
                    <h4><span class="glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                    <p>Thôn Lưu đông Xã Phú Túc Huyện Phú Xuyên Thành Phố Hà Nội</p>

                    <h4><span class="glyphicon glyphicon-envelope"></span> Email : </h4>
                    <p>ngkhanhduy1@gmail.com</p>

                    <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại : </h4>
                    <p>0373363073</p>



                    <br><br>
                  

                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection