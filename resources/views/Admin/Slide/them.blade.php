@extends('Admin.layout.master_ad')
@section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thêm slide
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
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
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/Slide/them" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Image Link</label>
                                <input class="form-control" name="link" placeholder="Nhập tên loại sản phẩm" />
                            </div>
                            <div class="form-group">
                                <label>Hình loại sản phẩm</label>
                                <input class="form-control" type="file" name="image" />
                            </div>
                            <button type="submit" class="btn btn-default">Thêm</button>
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