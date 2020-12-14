@extends('Admin.layout.master_ad')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa loại sản phẩm:
                            <small>{{$type_pro->name}}</small>
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
                        <form action="admin/TypeProducts/sua/{{$type_pro->id}}" method="POST" enctype="multipart/form-data">
                        	<input type="hidden" name="_token" value="{{
                            csrf_token()}}"/>
                            <div class="form-group">
                                <label>Tên loại sản phẩm</label>
                                <input class="form-control" name="name" value="{{$type_pro->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Mô tả loại sản phẩm</label>
                                <input class="form-control" name="description" value="{{$type_pro->description}}" />
                            </div>
                            <div class="form-group">
                                <label>Hình loại sản phẩm</label>
                                <input class="form-control" type="file" name="image" value="{{$type_pro->image}}" /><br>
                                <img width="100px" src="source/image/product/{{$type_pro->image}}" />
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
 @endsection