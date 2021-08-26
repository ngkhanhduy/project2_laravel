@extends('page.layout.index')

@section('content')
<div class="container">
    <div class="row main-left">
        @include('page.layout.menu')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h2 style="margin-top:0px; margin-bottom:0px;">Tin Tức</h2>
                </div>
                <div class="panel-body">
                    @foreach($category as $cate)
                    <!-- item -->
                    <div class="row-item row">
                        <h3>
                            <a href="categoryparent/{{$cate->Id}}">{{$cate->Name}}</a>|
                            @foreach($cate->category as $child)
                            <small><a href="category/{{$child->Id}}"><i>{{$child->Name}}</i></a>/</small>
                            @endforeach
                        </h3>
                        <?php
                            $new = [];
                            $new1 =[];
                            foreach($cate->category as $n){
                                foreach($n->new as $n1){
                                    if($n1->Status == 'Active'){
                                        $new[] = $n1;
                                    }
                                };
                            };
                            $rand_new = array_rand($new, 5);
                            foreach($rand_new as $n){
                                $new1[] = $new[$n];
                            };
                            $new2 = array_shift($new1);
                        ?>
                        <div class="col-md-8 border-right">
                            <div class="col-md-5">
                                <a href="/project2/public/new/{{$new2->Id}}">
                                    <img class="img-responsive" src="upload/images/{{$new2->Id}}.jpg" href="" alt="">
                                </a>
                            </div>

                            <div class="col-md-7">
                                <h3>{{$new2->Title}}</h3>
                                {!!$new2->Summary!!}
                                <a class="btn btn-primary" href="/project2/public/new/{{$new2->Id}}">Chi tiết<span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>

                        </div>


                        <div class="col-md-4">
                            @foreach($new1 as $n)
                            <a href="/project2/public/new/{{$n->Id}}">
                                <h4>
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                    {{$n->Title}}
                                </h4>
                            </a>
                            @endforeach
                        </div>

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