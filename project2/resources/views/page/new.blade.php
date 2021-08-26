@extends('page.layout.index')

@section('content')
<!-- Page Content -->
<div class="container">
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-9">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{$new->Title}}</h1>

            <!-- Author -->
            <p class="lead">
                 <a href="#">{{$new->user->Name}}</a>
            </p>

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span>{{$new->Created_at}}</p>
            <hr>

            <!-- Post Content -->
            <div>{!! $new->Content !!}</div>

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            @if(Auth::check())
            <div class="well">
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                <form role="form" action="/project2/public/comment/{{$new->Id}}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>
            @else
            <div class="well" >
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3" readonly>Vui lòng đăng nhập để bình luận</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>
            @endif
            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            @foreach($new->comment as $cmt)
            <div class="media">
                <div class="media-body">
                    <h4 class="media-heading">{{$cmt->user->Name}}
                        <small>{{$cmt->Created_at}}</small>
                    </h4>
                    {{$cmt->Content}}
                </div>
            </div>
            @endforeach


        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin liên quan</b></div>
                <div class="panel-body">

                    @foreach($re_new as $n)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="/project2/public/new/{{$n->Id}}">
                                <img class="img-responsive" src="upload/images/{{$n->Id}}.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="/project2/public/new/{{$n->Id}}"><b>{{$n->Title}}</b></a>
                        </div>
                        <p>{!!$n->Summary!!}</p>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    @endforeach
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin nổi bật</b></div>
                <div class="panel-body">
                    @foreach($hot_new as $n)
                    <!-- item -->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="/project2/public/new/{{$n->Id}}">
                                <img class="img-responsive" src="upload/images/{{$n->Id}}.jpg" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="/project2/public/new/{{$n->Id}}"><b>{{$n->Title}}</b></a>
                        </div>
                        <p>{!!$n->Summary!!}</p>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                    @endforeach
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection