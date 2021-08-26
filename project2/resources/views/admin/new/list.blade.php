@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin Tức
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Thể loại</th>
                                <th>Tác giả</th>
                                <th>Trạng thái</th>
                                <th>Số lượt xem</th>
                                <th>bình luận</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(session('thongbao'))
                                <div class="alert alert-success">
                                    {{session('thongbao')}}
                                </div>
                            @endif
                            @foreach($new as $n)
                                    <tr class="odd gradeX" align="center">
                                        <th>{{$n->Id}}</th>
                                        <th>{{$n->Title}}</th>
                                        <th>{{$n->category->Name}}</th>
                                        <th>{{$n->user->Name}}</th>
                                        <th>{{$n->Status}}</th>
                                        <th>{{$n->Views}}</th>
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/new/getcommentby/{{$n->Id}}">xem</a></td>
                                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/new/delete/{{$n->Id}}"> Delete</a></td>
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/new/edit/{{$n->Id}}">Edit</a></td>
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
