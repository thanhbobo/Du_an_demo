@extends('Admin.layout.master_ad')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh sách sản phẩm
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
                                <th>Tên sản phẩm</th>
                                <th>Loại sản phẩm</th>
                                <th>Mô tả</th>
                                <th>Mô tả chi tiết</th>
                                <th>Gía gốc</th>
                                <th>Gía khuyến mại</th>
                                 <th>Đơn vị tính</th>
                                <th>Loại hàng</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $pro)
                            <tr class="odd gradeX" align="center">
                                <td>{{$pro->id}}</td>
                                <td>
                                    <p>{{$pro->name}}</p>
                                    <img width="100px" src="source/image/product/{{$pro->image}}" />
                                </td>
                                <td>{{$pro->type_products->name}}</td>
                                <td>{{$pro->description}}</td>
                                <td>{{$pro->description_ct}}</td>
                                <td>{{$pro->unit_price}}</td>
                                <td>{{$pro->promotion_price}}</td>
                                <td>{{$pro->unit}}</td>
                                <td>@if($pro->new == 1)
                                    {{"Mới"}}
                                    @else
                                    {{"Cũ"}}
                                    @endif</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/Products/xoa/{{$pro->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/Products/sua/{{$pro->id}}">Edit</a></td>
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