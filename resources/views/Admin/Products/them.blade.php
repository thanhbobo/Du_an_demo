@extends('Admin.layout.master_ad')
@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm sản phẩm
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
                        <form action="admin/Products/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{
                            csrf_token()}}" />
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input class="form-control" name="name" placeholder="Nhập đầy đủ tên sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Loại cây</label>
                                <select class="form-control" name="name_loai">
                                    @foreach($type_products as $type_pro)
                                        <option value="{{$type_pro->id}}">{{$type_pro->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" name="description" placeholder="Nhập mô tả" ></textarea>
                            </div>
                             <div class="form-group">
                                <label>Mô tả chi tiết</label>
                                <textarea class="form-control" name="description_ct" placeholder="Nhập mô tả chi tiết" ></textarea>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                <label>Gía</label>
                                <input class="form-control" name="unit_price" placeholder="Nhập giá" />
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                <label>Gía khuyến mại</label>
                                <input class="form-control" name="promotion_price" placeholder="Nhập giá khuyến mại(có thể là 0)" />
                            </div>
                            <div class="form-group">
                                <label>Hình sản phẩm</label>
                                <input class="form-control" type="file" name="image" />
                            </div>
                             <div class="form-group">
                                <label>Đơn vị tính</label>
                                <input class="form-control" name="unit" placeholder="Nhập đơn vị tính sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Loại hàng</label>
                                <input class="form-control" name="new" placeholder="1 là sản phẩm mới,0 là sản phẩm cũ" />
                            </div>
                            <button type="submit" class="btn btn-default">Thêm </button>
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