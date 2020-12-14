@extends('Admin.layout.master_ad')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa người dùng:
                            <small>{{$user->full_name}}</small>
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
                        <form action="admin/User/sua/{{$user->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{
                            csrf_token()}}"/>
                            <div class="form-group">
                                <label>Tên người dùng</label>
                                <input class="form-control" name="full_name" placeholder="Nhập tên người dùng" value="{{$user->full_name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Nhập tên tài khoản" value="{{$user->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input class="form-control" name="phone" placeholder="Nhập tên tài khoản" value="{{$user->phone}}"  />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input class="form-control" name="address" placeholder="Nhập tên tài khoản" value="{{$user->address}}"  />
                            </div>
                            <div class="form-group">
                                <label>Giới tính</label>
                                <label class="radio-inline">
                                    <input name="gender" value="Nam" 
                                    @if($user->gender == "Nam")
                                    {{"checked"}}
                                    @endif
                                     type="radio">Nam
                                </label>
                                <label class="radio-inline">
                                    <input name="gender" value="Nữ"
                                    @if($user->gender == "Nữ")
                                    {{"checked"}}
                                    @endif
                                     type="radio">Nữ
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu"/>
                            </div>
                            <div class="form-group">
                                <label>Nhập lại Password</label>
                                <input type="password" class="form-control" name="NLPassword" placeholder="Nhập lại mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Quyền</label>
                                <label class="radio-inline">
                                    <input name="quyen" value="1" 
                                    @if($user->quyen == 1)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="quyen" value="0"
                                    @if($user->quyen == 0)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Member
                                </label>
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