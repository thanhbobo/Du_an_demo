@extends('Admin.layout.master_ad')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sửa tình trạng đơn hàng:
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
                        <form action="admin/Bills/sua/{{$bills->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{
                            csrf_token()}}"/>
                            <div class="form-group">
                                <label>Tên khách hàng</label>
                                <input class="form-control" name="full_name" value="{{$bills->customer->name}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Ngày đặt hàng</label>
                                <input class="form-control" name="date_order" value="{{$bills->date_order}}" readonly=""/>
                            </div>
                            <div class="form-group">
                                <label>Tổng tiền</label>
                                <input class="form-control" name="total"  value="{{$bills->total}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <label>HT thanh toán</label>
                                <input class="form-control" name="payment"  value="{{$bills->payment}}"readonly="" />
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <label class="radio-inline">
                                    <input name="note" value="Đang giao" 
                                    @if($bills->note == "Đang giao")
                                    {{"checked"}}
                                    @endif
                                     type="radio">Đang giao
                                </label>
                                <label class="radio-inline">
                                    <input name="note" value="Đã giao"
                                    @if($bills->note == "Đã giao")
                                    {{"checked"}}
                                    @endif
                                     type="radio">Đã giao
                                </label>
                                 <label class="radio-inline">
                                    <input name="note" value="Hoàn thành"
                                    @if($bills->note == "Hoàn thành")
                                    {{"checked"}}
                                    @endif
                                     type="radio">Hoàn thành
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