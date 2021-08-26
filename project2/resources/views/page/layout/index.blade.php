<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Web Tin tuc</title>
    <base href="{{asset('')}}">

    <!-- Bootstrap Core CSS -->
    <link href="page_asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="page_asset/css/shop-homepage.css" rel="stylesheet">
    <link href="page_asset/css/my.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/project2/public/home"> Trang chủ</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/project2/public/contact">Liên hệ</a>
                    </li>
                </ul>

                <form action="/project2/public/search" method="post" class="navbar-form navbar-left" role="search">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">

                        <input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa">
                    </div>
                    <button type="submit" class="btn btn-default">Tìm kiếm</button>
                </form>

                <ul class="nav navbar-nav pull-right">
                    @if((Auth::check()))
                    <li>
                        <a href="/project2/public/infor/{{Auth::user()->Id}}">
                            <span class="glyphicon glyphicon-user"></span>

                            {{Auth::user()->Name}}

                        </a>
                    </li>
                    @endif
                    @if((Auth::check()))
                    <li>
                        <a href="/project2/public/logout">Đăng xuất</a>
                    </li>
                    @else
                    <li>
                        <a href="/project2/public/register">Đăng ký</a>
                    </li>
                    <li>
                        <a href="/project2/public/login">Đăng nhập</a>
                    </li>
                    @endif





                </ul>
            </div>



            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    @yield('content')

    <!-- Footer -->
    <hr>
    <!-- jQuery -->
    <script src="page_asset/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="page_asset/js/bootstrap.min.js"></script>
    <script src="page_asset/js/my.js"></script>
    @yield('script')

</body>

</html>