@extends('page.layout.index')

@section('content')
<div class="container">
    <div class="row">
        @include('page.layout.menu')

        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h4><b>Kết quả tìm kiếm</b></h4>
                </div>
                @foreach($new as $n)
                <div class="row-item row">
                    <div class="col-md-3">

                        <a href="/project2/public/new/{{$n->Id}}">
                            <br>
                            <img width="200px" height="200px" class="img-responsive" src="upload/images/{{$n->Id}}.jpg" alt="">
                        </a>
                    </div>

                    <div class="col-md-9">
                        <h3>{{$n->Title}}</h3>
                        <p>{!!$n->Summary!!}</p>
                        <a class="btn btn-primary" href="/project2/public/new/{{$n->Id}}">Chi tiết<span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                    
                </div>
                @endforeach
            
                {{$new->links('page.layout.pagination')}}

            </div>
        </div>

    </div>

</div>
@endsection