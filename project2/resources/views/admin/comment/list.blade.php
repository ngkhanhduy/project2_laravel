@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể loại
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Nội dung</th>
                                <th>Người bình luận</th>
                                <th>Thời gian</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            @foreach($comment as $cmt)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$cmt->Id}}</td>
                                    <td>{{$cmt->Content}}</td>
                                    <td>{{$cmt->user->Name}}</td>
                                    <td>{{$cmt->Created_at}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comment/delete/{{$cmt->Id}}"> Delete</a></td>
                                </tr>   
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
