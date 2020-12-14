@extends('Admin.layout.master_ad')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách khách hàng
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Mã khách hàng</th>
                                <th>Tên khách hàng</th>
                                <th>Giới tính</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Ghi chú</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customer as $cus)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cus->id}}</td>
                                <td>{{$cus->id_user}}</td>
                                <td>{{$cus->name}}</td>
                                <td>{{$cus->gender}}</td>
                                <td>{{$cus->email}}</td>
                                <td>{{$cus->phone_number}}</td>
                                <td>{{$cus->note}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/Products/xoa/{{$cus->id}}"> Delete</a></td>
                                {{-- <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/Products/sua/{{$cus->id}}">Edit</a></td> --}}
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