@extends('Admin.layout.master_ad')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" > Phản hồi của khách hàng</h1>
                    </div>
                      @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên KH</th>
                                <th>Email KH</th>
								<th>Feedback</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fb_kh as $fb)
                            <tr class="odd gradeX" align="center">
                                <td>{{$fb->id}}</td>
                                <td>{{$fb->your_name}}</td>
                                <td>{{$fb->your_email}}</td>
                                <td>{{$fb->your_message}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/Feedback/xoa/{{$fb->id}}"> Delete</a></td>
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