@extends('Author.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>Chinh sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="author/new/edit/{{$new->Id}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group">
                                <label>Thể loại Cha</label>
                                <select id="categoryid" class="form-control" >
                                    @foreach($cate as $c)
                                        <option value="{{$c->Id}}">{{$c->Name}}</option>   
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thể loại </label>
                                <select id="category" class="form-control" name="categoryid">
                                    @foreach($cate as $c)
                                        <option value="{{$c->Id}}">{{$c->Name}}</option>   
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <textarea class="form-control" name="title">{{$new->Title}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea id="text" class="form-control ckeditor" name="summary">{{$new->Summary}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="text" class="form-control ckeditor" name="content">{{$new->Content}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#categoryid").change(function(){
                var id = $(this).val();
                $.get("author/ajax/category/"+id,function(data){
                    $("#category").html(data);
                });
            });
        });
    </script>    
@endsection
