@extends('Admin.layout.master_ad')
@section('content')
	<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="col-lg-12">
                        <h1 class="page-header">Tổng số hoá đơn trên hệ thống: {{count($bills)}} </h1>
                    </div>
            </div>
            <div class="container-fluid">
            	 <!-- /.row -->
                 <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm bán chạy:
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Loại sản phẩm</th>
                                <th>Gía gốc</th>
                                <th>Gía khuyến mại</th>
                                 <th>Đơn vị tính</th>
                                 <th>Số lượng bán</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sp_banchays as $pro)
                            <tr class="odd gradeX" align="center">
                                <td>{{$pro->id}}</td>
                                <td>
                                    <p>{{$pro->name}}</p>
                                    <img width="100px" src="source/image/product/{{$pro->image}}" />
                                </td>
                                <td>{{$pro->type_products->name}}</td>
                               {{--  <td>
                                @foreach($type_products as $type)
									@if($pro->id_type == $type->id)
										{{$type->name}}
									@endif
                                @endforeach
                                </td> --}}
                                <td>{{$pro->unit_price}}</td>
                                <td>{{$pro->promotion_price}}</td>
                                <td>{{$pro->unit}}</td>
                                <td>{{$pro->countId}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm mới:
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Loại sản phẩm</th>
                                <th>Gía gốc</th>
                                <th>Gía khuyến mại</th>
                                 <th>Đơn vị tính</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($new_products as $pro)
                            <tr class="odd gradeX" align="center">
                                <td>{{$pro->id}}</td>
                                <td>
                                    <p>{{$pro->name}}</p>
                                    <img width="100px" src="source/image/product/{{$pro->image}}" />
                                </td>
                                <td>{{$pro->type_products->name}}</td>
                               {{--  <td>
                                @foreach($type_products as $type)
									@if($pro->id_type == $type->id)
										{{$type->name}}
									@endif
                                @endforeach
                                </td> --}}
                                <td>{{$pro->unit_price}}</td>
                                <td>{{$pro->promotion_price}}</td>
                                <td>{{$pro->unit}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
               
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection