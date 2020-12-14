@extends('Admin.layout.master_ad')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa thông tin sản phẩm
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>
                            @endforeach
                        </div>
                        @endif

                        @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                        @endif
                        <form action="admin/Products/sua/{{$products->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{
                            csrf_token()}}"/>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="name" value="{{$products->name}}"  />
                            </div>
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <select class="form-control" name="name_loai">
                                    @foreach($type_products as $type_pro)
                                     <option 
                                        @if($products->id_type == $type_pro->id)
                                            {{"selected"}}
                                        @endif
                                        value="{{$type_pro->id}}" >{{$type_pro->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="description" >{{$products->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Mô tả chi tiết</label>
                                <textarea class="form-control" name="description_ct">{{$products->description_ct}}</textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                <label>Gía</label>
                                <input class="form-control" name="unit_price" value="{{$products->unit_price}}"  />
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                <label>Gía khuyến mại</label>
                                <input class="form-control" name="promotion_price" value="{{$products->promotion_price}}"  />
                            </div>
                            <div class="form-group">
                                <label>Hình sản phẩm</label>
                                <input class="form-control" type="file" name="image" value="{{$products->image}}" /><br>
                                <img width="100px" src="source/image/product/{{$products->image}}" />
                            </div>
                             <div class="form-group">
                                <label>Đơn vị tính</label>
                                <input class="form-control" name="unit"  value="{{$products->unit}}"  />
                            </div>
                            <div class="form-group">
                                <label>Loại hàng</label>
                                <input class="form-control" name="new" value="{{$products->new}}"  />
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
 @endsection